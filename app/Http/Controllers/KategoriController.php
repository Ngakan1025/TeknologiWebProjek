<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        $title = "Daftar Kategori";
        return view('admin.kategori', compact('title', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Input Kategori";
        return view('admin.kategoriinput', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required' => "Kolom :attribute harus lengkap",
            'date' => "Kolom :attribute harus tanggal",
            'numeric' => "Kolom :attribute harus angka"
        ];
        $validasi = $request->validate([
            'kategori' => 'required',
        ],$message);
        $validasi['user_id'] = Auth::id();
        Kategori::create($validasi);

        return redirect('kategori')->with('success', 'Data berhasil tersimpan');
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
        $kategori = Kategori::find($id);
        $title = "Edit kategori";
        return view('admin.kategoriinput', compact('title', 'kategori'));
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
        $message=[
            'required' => "Kolom :attribute harus lengkap",
            'date' => "Kolom :attribute harus tanggal",
            'numeric' => "Kolom :attribute harus angka"
        ];
        $validasi = $request->validate([
            'kategori' => 'required'
        ],$message);       
        $kategori = Kategori::find($id);       
        Kategori::where('id', $id)->update($validasi);

        return redirect('kategori')->with('succes', 'Data berhasil terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = kategori::find($id);
        if ($kategori != null) {
            $kategori = kategori::find($kategori->id);
            Kategori::where('id', $id)->delete();
        }
        
        return redirect('kategori')->with('success', 'Data berhasil terhapus');
    }
}