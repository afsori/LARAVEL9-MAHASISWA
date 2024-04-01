<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function index(){
        return view('halaman.index');
    }
    function tentang(){
        return view('halaman.tentang');
    }
    function kontak(){

        $data = [
            'title' => 'Kontak Kami',
            'kontak' => [
                'email' => 'p5VQc@example.com',
                'telp' => '081234567890',
            ],
        ];
        return view('halaman.kontak')->with($data);
    }
}
