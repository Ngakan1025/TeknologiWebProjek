<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\Buku;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjam = Pinjam::with('buku')->latest()->paginate();
        // $pinjam = Pinjam::all();
        $judul = "Daftar Buku";
        return view('admin.pinjam', compact('judul', 'pinjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = Buku::all();
        $title = "Input Peminjam";
        return view('admin.pinjaminput', compact('title', 'buku'));
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
            'nama' => 'required',
            'alamat' => 'required',
            'telephone' => 'required',
            'tanggal' => 'required',
            'buku_id' => 'required'
        ],$message);
        Pinjam::create($validasi);

        return redirect('pinjam')->with('success', 'Data berhasil tersimpan');
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
        $buku = Buku::all();
        $pinjam = Pinjam::with('buku')->find($id);
        $title = "Edit Peminjam";
        return view('admin.pinjaminput', compact('title', 'pinjam', 'buku'));
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
            'nama' => 'required',
            'alamat' => 'required',
            'telephone' => 'required',
            'tanggal' => 'required',
            'buku_id' => 'required'
        ],$message);           
        Pinjam::where('id', $id)->update($validasi);

        return redirect('pinjam')->with('succes', 'Data berhasil terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pinjam = Pinjam::find($id);
        if ($pinjam != null) {
            $pinjam = Pinjam::find($pinjam->id);
            Pinjam::where('id', $id)->delete();
        }
        
        return redirect('pinjam')->with('success', 'Data berhasil terhapus');
    }
}