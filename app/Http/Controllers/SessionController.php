<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    function register(){
        return view('session.register');
    }

    function create(Request $request){

        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Silahkan masukkan email yang valid',
            'email.unique' => 'Email sudah terdaftar, silahkan masukkan email yang berbeda',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Masukkan password minimal 6 karakter',
        ]);

        $dataRegister = [
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make($request -> password),
        ];

        User::create($dataRegister);

        $dataLogin = [
            'email' => $request -> email,
            'password' => $request -> password,
        ];

        if(Auth::attempt($dataLogin)){
            // jika auth login sukses
            return redirect('/mahasiswa') -> withSuccess(Auth::user()->name . ' Login sukses');
        }else{
            // jika auth login gagal
            return redirect('/session') -> withErrors('Email atau password salah');
        }
    }
}
