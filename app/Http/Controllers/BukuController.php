<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::with('kategori')->latest()->paginate(100);
        // $buku = Buku::all();
        $title = "Data Buku";
        return view('admin.berandabuku', compact('title', 'buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $title = "Imput Buku";
        return view('admin.inputbuku', compact('title', 'kategori'));
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
            'title' => 'required|unique:buku|max:255',
            'kategori_id'=> 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'cover' => 'required|mimes:jpg,bmp,png|max:10240'
        ],$message);
        // $filename = time().$request->file('cover')->getClientOriginalName();
        $path = $request->file('cover')->store('covers');
        $validasi['user_id'] = Auth::id();
        $validasi['cover'] = $path;
        Buku::create($validasi);

        return redirect('buku')->with('success', 'Data berhasil tersimpan');
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
        $kategori = Kategori::all();
        $buku = Buku::with('kategori')->find($id);
        $title = "Edit Buku";
        return view('admin.inputbuku', compact('title', 'buku', 'kategori'));
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
            'title' => 'required|unique:buku|max:255',
            'kategori_id' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'cover' => 'required|mimes:jpg,bmp,png|max:10240'
        ],$message);
        if ($request->hasFile('cover')) {
            $fileName = time().$request->file('cover')->getClientOriginalName();
            $path = $request->file('cover')->storeAs('covers', $fileName);
            $validasi['cover'] = $path;
            $buku = Buku::find($id);
            Storage::delete($buku->cover);
        }        
        $validasi['user_id'] = Auth::id();
        Buku::where('id', $id)->update($validasi);

        return redirect('buku')->with('success', 'Data berhasil terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        if ($buku != null) {
            Storage::delete($buku->cover);
            $buku = Buku::find($buku->id);
            Buku::where('id', $id)->delete();
        }
        
        return redirect('buku')->with('success', 'Data berhasil terhapus');
    }

    public function cari(Request $request){

        $cari = $request->search;

        $buku = Buku::where('title','like','%'.$cari.'%')->get();
        return view('admin.berandabuku', ['buku' => $buku]);
    }
}