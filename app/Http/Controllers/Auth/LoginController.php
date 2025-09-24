<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Redirigi in base al ruolo
            $user = Auth::user();
            switch ($user->ruolo) {
                case 'Admin':
                    return redirect()->route('admin.dashboard');
                case 'Titolare':
                    return redirect()->route('titolare.dashboard');
                case 'BarManager':
                    return redirect()->route('barmanager.dashboard');
                case 'RegisterManager':
                    return redirect()->route('registermanager.dashboard');
                default:
                    return redirect()->route('login');
            }
        }

        return back()->withErrors([
            'email' => 'Le credenziali non sono corrette.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
