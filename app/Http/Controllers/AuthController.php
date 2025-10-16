<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function getLogin(Request $request)
    {
        $hideNav = true;
        $callback = $request->input('callback');
        return Inertia::render('LoginPage', ['hide_nav' => true, 'callback' => $callback]);
    }

    /**
     * @throws ValidationException
     */
    public function checkLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username không được để trống.',
            'password.required' => 'Password không được để trống.',
        ]);
        //  Kiem tra username
        $user = User::query()->where('username', $request->input('username'))->first();
        if (!$user) {
            throw ValidationException::withMessages([
                'username' => 'Username không tồn tại.'
            ]);
        }
        //  Kiem tra password
        if (!Hash::check($request->input('password'), $user->password)) {
            throw ValidationException::withMessages([
                'password' => 'Password không đúng.'
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->to($request->input('callback', '/'))->with(['user' => Auth::user()]);
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect($request->input('callback'));
    }
}
