<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $title = "Daftar User";
        return view('admin.user', compact('title', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Input User";
        return view('admin.userinput', compact('title'));
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
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
        ],$message);
        $validasi['user_id'] = Auth::id();
        User::create($validasi);

        return redirect('user')->with('success', 'Data berhasil tersimpan');
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
        $user = User::find($id);
        $title = "Edit User";
        return view('admin.userinput', compact('title', 'user'));
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
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
        ],$message);       
        $validasi['user_id'] = Auth::id();        
        User::where('id', $id)->update($validasi);

        return redirect('user')->with('succes', 'Data berhasil terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user = User::find($user->id);
            User::where('id', $id)->delete();
        }
        
        return redirect('user')->with('success', 'Data berhasil terhapus');
    }
}