<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = mahasiswa::all();
        $data = mahasiswa::orderBy('nim', 'desc')->paginate(5);
        return view('mahasiswa.index')->with('mahasiswa', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nim', $request->nim);
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);

        $request->validate([
            'nim'=>'required|numeric',
            'nama'=> 'required',
            'alamat'=> 'required',
            'foto'=> 'required|mimes:jpeg,jpg,png'
        ], [
            'nim.required' => 'NIM harus diisi',
            'nim.numeric' => 'NIM harus berupa angka',
            'nama.required' => 'Nama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.mimes' => 'Foto hanya boleh jpeg,jpg,png',
        ]);

        $foto_file = $request->file('foto');
        $foto_extention = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_extention;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'foto' => $foto_nama
        ];
        mahasiswa::create($data);
        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return 'saya mahasiswa dari controller dengan is ' . $id;
        // return view('mahasiswa.detail');

        $data = mahasiswa::where('nim', $id)->first();
        return view('mahasiswa.detail')->with('mahasiswa', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = mahasiswa::where('nim', $id)->first();
        return view('mahasiswa.edit')->with('dataEdit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=> 'required',
            'alamat'=> 'required',
            'foto'=> 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'foto.required' => 'Alamat harus diisi',
        ]);

        $foto_filte = $request->file('foto');
        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
        ];

        if ($request->hasFile('foto')) {
            // memassukan data foto baru
            $request->validate([
                'foto' => 'mimes:jpeg,jpg,png'
            ], [
                'foto.mimes' => 'Foto harus berupa jpeg,jpg,png',
            ]);

            $foto_file = $request->file('foto');
            $foto_extention = $foto_file->extension();
            $foto_nama = date('ymdhis') . '.' . $foto_extention;
            $foto_file->move(public_path('foto'), $foto_nama);
            // end memassukan data foto baru
            
            // menghapus data lama
            $old_foto = mahasiswa::where('nim', $id)->first();
            File::delete(public_path('foto') . '/' . $old_foto->foto);

            // memasukkan data foto ke DB
            // $data = [
            //     'foto' => $foto_nama
            // ];
            $data['foto'] = $foto_nama;
        }


        mahasiswa::where('nim', $id)->update($data);
        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = mahasiswa::where('nim', $id)->first();
        File::delete(public_path('foto') . '/' . $data->foto);
        mahasiswa::where('nim', $id)->delete();
        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
