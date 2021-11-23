<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\mahasiswa;
class mahasiswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['mahasiswa'] = mahasiswa::all();
        return view('mahasiswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'unique:mahasiswa,nim'
        ]);
        $data = [
            'nim' => $request ->nim,
            'nama_lengkap' => $request ->nama_lengkap,
            'kelas' => $request ->kelas,
            'prodi' => $request ->prodi,
            'jenis_kelamin' => $request ->jenis_kelamin,
            'tempat_lahir' => $request ->tempat_lahir,
            'tanggal_lahir' => $request ->tanggal_lahir,
            'alamat' => $request ->alamat,
        ];
        mahasiswa::create($data);
        return redirect()->route('mahasiswa.index')->with('berhasil', 'data mahasiswa berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = mahasiswa::find($id);

        return view('mahasiswa.edit', $data);
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
        $mahasiswa = mahasiswa::findOrfail($id);

        $request->validate([
            'nim' => "unique:mahasiswa,nim,$mahasiswa->id"
        ]);
        $data = [
            'nim' => $request ->nim,
            'nama_lengkap' => $request ->nama_lengkap,
            'kelas' => $request ->kelas,
            'prodi' => $request ->prodi,
            'jenis_kelamin' => $request ->jenis_kelamin,
            'tempat_lahir' => $request ->tempat_lahir,
            'tanggal_lahir' => $request ->tanggal_lahir,
            'alamat' => $request ->alamat,
        ];
        $mahasiswa->update($data);
        return redirect()->route('mahasiswa.index')->with('berhasil', 'data mahasiswa berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = mahasiswa::find($id);

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('berhasil', 'data mahasiswa telah berhasil di hapus');
    }
}
