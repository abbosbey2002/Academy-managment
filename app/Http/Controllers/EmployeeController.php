<?php

namespace App\Http\Controllers;

use App\Helpers\MainHelper;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Models\Region;
use App\Models\Transaction;
use App\Models\District;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Enrollment;
use App\Models\Enrollment_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.employees.login');
    }

    public function index()
    {
        //$users = User::whereNotIn('id', [16, 2])->where('status','!=', 'completed')->latest()->paginate(10);
        //$users = User::whereNotIn('id', [16, 2])->get(); // Check if this part works
        $users = User::where('status', null)->get();
        // $users = User::whereNotIn('id', [16, 2])
        //      ->where('status', null)
        //      ->orderBy('updated_at', 'desc') // or any other column
        //      ->paginate(20);

        
        return view('pages.employees.index', compact('users'));
    }

    public function view(User $user)
    {
        $users = User::whereNotIn('id', [16, 2])->latest()->paginate(10);
        $student = Student::first();
        $lastTransaction = Transaction::where('amount', 10)->get();
        
        // O'qituvchining guruhlari
        $groups = $user->groups;
        
        // Guruh ID'larini tekshiramiz
        $groupIds = $groups->pluck('id');
        
        // O'qituvchining guruhlariga oid invoice'larni olish
        $invoices = Invoice::whereIn('group_id', $groupIds)->orderBy('created_at', 'desc')->limit(10)->get();
        
        // O'qituvchining guruhlariga oid to'lovlarni olish
        $transactions = Transaction::whereIn('group_id', $groupIds)->with('student')->get();
        
        // O'qituvchining o'quvchilarini olish
        $enrollments = Enrollment::where('user_id', $user->id)->with('student')->get();
        $teacherStudents = $enrollments->map(function($enrollment) {
            return $enrollment->student;
        });

        return view('pages.employees.view', compact('users', 'user', 'lastTransaction', 'student', 'invoices', 'transactions', 'groups', 'teacherStudents'));
    }

    public function register()
    {
        $regions = Region::all();
        return view('pages.employees.register', compact('regions'));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

        public function register_store(Request $request)
        {
            $request->validate([
                'branch_id' => 'nullable|exists:branches,id',
                'first_name' => 'nullable|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'email' => 'nullable|email:rfc,dns|unique:users,email',
                'pinfl' => 'nullable|string|min:14',
                'password' => 'nullable|min:6',
                'phone_number' => 'nullable|string',
                'address' => 'nullable|string|max:255',
                'specialization' => 'nullable|string|max:255',
                'role' => 'nullable|in:0,1,2',
                'district_id' => 'nullable|exists:districts,id',
                'region_id' => 'nullable|exists:regions,id',
                'birth_date' => 'nullable|date_format:Y-m-d',
            ]);

            // Telefon raqamini +998 bilan formatlash
            $phone_number = $request->input('phone');
            if (!empty($phone_number)) {
                $phone_number = preg_replace('/[^+\d]/', '', $request->phone) ;
            }

            $district = District::findOrFail($request->district_id);
            $region = Region::findOrFail($request->region_id);
            $user = User::create([
                'branch_id' => $request->input('branch_id') ?? null,
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'pinfl' => $request->input('pinfl'),
                'email' => $request->input('email'),
                'birth_date' => $request->input('birth_date'),
                'password' => Hash::make($request->input('password')),
                'phone_number' => $phone_number,
                'address' => $region->name . " " . $district->name,
                'specialization' => $request->input('specialization'),
                'role' => $request->input('role'),
                'district_id' => $request->input('district_id'),
                'region_id' => $request->input('region_id'),
            ]);

            return redirect()->route('employee.index')->with('success', 'Muvaffaqiyatli ro\'yxatdan o\'tdingiz');
        }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $regions = Region::all(); // Viloyatlarni olish
        $districts = District::all(); // Tumanlarni olish

        return view('pages.employees.edit', compact('user', 'regions', 'districts'));
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([
            'branch_id' => 'nullable|exists:branches,id',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'pinfl' => 'nullable',
            'specialization' => 'nullable|string|max:255',
            'role' => 'nullable|in:0,1,2',
            'district_id' => 'nullable|exists:districts,id',
            'region_id' => 'nullable|exists:regions,id',
            'password' => 'nullable|min:6|confirmed',
            'birth_date' => 'nullable|date', // Ensure birth_date is a valid date
        ]);

        // Find the user by ID or fail
        $user = User::findOrFail($id);

        // Optional: Check if district and region IDs are provided and valid
        $district = null;
        $region = null;

        if ($request->has('district_id') && $request->has('region_id')) {
            $district = District::find($request->district_id);
            $region = Region::find($request->region_id);
        }

        // Telefon raqamini +998 bilan formatlash
        $phone_number = $request->input('phone_number');
        if (!empty($phone_number)) {
            $phone_number = preg_replace('/[^+\d]/', '', $request->phone_number);
        }

        // Update user fields conditionally
        $user->branch_id = $request->input('branch_id', $user->branch_id);
        $user->first_name = $request->input('first_name', $user->first_name);
        $user->last_name = $request->input('last_name', $user->last_name);
        $user->pinfl = $request->input('pinfl', $user->pinfl);
        $user->phone_number = $phone_number;
        $user->specialization = $request->input('specialization', $user->specialization);
        $user->role = $request->input('role', $user->role);
        $user->district_id = $request->input('district_id', $user->district_id);
        $user->region_id = $request->input('region_id', $user->region_id);
        $user->birth_date = $request->input('birth_date', $user->birth_date);

        // Update address only if district and region are found
        if ($region && $district) {
            $user->address = $region->name . " " . $district->name;
        } else {
            $user->address = $request->input('address', $user->address);
        }

        // Update password if it's filled in the request
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Save the user
        $user->save();

        // Redirect back with success message
        return redirect()->route('employee.index')->with('success', 'Foydalanuvchi muvaffaqiyatli yangilandi');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('employee.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function delete_status(Request $request){
        $employee = User::findOrFail($request->employee_id);

        $employee->update([
            'status' => 'completed',
        ]);

        return redirect()->route('employee.index')->with('success', 'employee successfully deleted');
    }
}
