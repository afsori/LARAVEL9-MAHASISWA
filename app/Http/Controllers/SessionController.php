<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index(){
        return view('session.index');
    }

    function login(Request $request){

        Session::flash('email', $request->email);
        Session::flash('password', $request->password);

        $request -> validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $dataLogin = [
            'email' => $request -> email,
            'password' => $request -> password,
        ];

        if(Auth::attempt($dataLogin)){
            // jika auth login sukses
            return redirect('/mahasiswa') -> withSuccess('Login sukses');
        }else{
            // jika auth login gagal
            return redirect('/session') -> withErrors('Email atau password salah');

        }
    }

    function logout(){
        Auth::logout();
        return redirect('/session') -> withSuccess('Logout sukses');
    }
}
