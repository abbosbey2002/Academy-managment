<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/student/dashboard';

    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }

    protected function guard()
    {
        return auth()->guard('student');
    }

    public function showLoginForm()
    {
        return view('auth.student-login');
    }

public function login(Request $request)
{
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    // Assuming you have a custom hashing method, replace this with your logic
    $hashedPassword = Hash::make($request->password);

    // Compare the custom hashed password with the one in the database
    $student = auth()->guard('student')->getProvider()->retrieveByCredentials(['email' => $request->email]);

    if ($student && $student->password === $hashedPassword) {
        auth()->guard('student')->login($student, $request->get('remember'));
        return redirect()->intended($this->redirectPath());
    }

    return back()->withErrors([
        'email' => 'These credentials do not match our records.',
    ]);
}


}
