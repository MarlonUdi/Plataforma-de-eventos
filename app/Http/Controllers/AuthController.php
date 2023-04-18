<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function post(Request $request) {

        $data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'password_confirmation' => 'required'
            ],
            [
                'name.required' => '*O campo de nome é obrigatório!',
                'email.required' => '*O campo de email é obrigatório!',
                'email.email' => '*Email inválido!',
                'email.unique' => '*Este email já está vinculado a uma conta existente!',
                'password.required' => '*O campo de senha é obrigatório!',
                'password.min' => '*A senha precisa ter no mínimo 8 digitos!',
                'password_confirmation' => '*O campo de confirmar senha é obrigatório!'
            ]
        );

        if($data['password'] != $data['password_confirmation']) {
            return redirect()->back()->with('error', '*Confirme a senha corretamente!');
        }

        $user_register = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ];

        $user = User::create($user_register);

        Auth::login($user);

        return redirect(route('home'));
    }

    public function auth(Request $request) {

        $data = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => '*O campo de email é obrigatório!',
                'email.email' => '*Email inválido!',
                'password.required' => '*O campo de senha é obrigatório!'
            ]
        );

        if(Auth::attempt($data, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('error', '*Email ou senha inválida!');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('auth.login'));
    }

// fim
}
