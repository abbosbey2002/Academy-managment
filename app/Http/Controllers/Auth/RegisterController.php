<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Ro'yxatdan o'tgandan keyin yo'naltiriladigan manzil
    protected $redirectTo = '/student/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Validatsiya qilish funksiyasi
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // Ro'yxatdan o'tish funksiyasi
    public function register(Request $request)
    {
        // Kiruvchi ma'lumotlarni validatsiya qilish
        $this->validator($request->all())->validate();

        // Yangi student yaratish va ma'lumotlarni bazaga saqlash
        $student = Student::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => '+998' . preg_replace('/\s+/', '', $request->input('phone')),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => 'pending ',
        ]);

        // Foydalanuvchini avtomatik tizimga kiritish (agar kerak bo'lsa)
        auth()->guard('student')->login($student);

        // Tizimga kirgandan so'ng yo'naltirish
        return redirect($this->redirectTo);
    }

    // Ro'yxatdan o'tish formasini ko'rsatish funksiyasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}