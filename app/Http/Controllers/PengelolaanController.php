<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengelolaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //function menampilkan semua data pengelola
        $data = User::all();
        return view('/pengelolaan/pengelolaan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //function menuju form tambah pengelola
        $data = User::all();
        return view('/pengelolaan/create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //function tambah pengelola
        $request->validate([
            'name' => 'required',
            'email' => 'required|string',
            'password' => 'required',
            'role' => 'string',
    ]);

    $data = new User();
    $data->name = $request->name;
    $data->email = $request->email;
    $data->password = Hash::make($request->password);
    $data->role = $request->role;
    $data->save();

    return redirect('/pengelolaan')->with('success', 'berhasil tambah pengelola');
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
        //function menuju form edit
        $data = User::findOrFail($id);
        return view('pengelolaan/edit', compact('data'));
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
        //function edit atau update data pengelola
        $data = User::findOrFail($id);

        $request->validate([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
        ]);
    
        $data->name = $request->name;
        $data->email = $request->email;
            if ($request->password)
                $data->password = Hash::make($request->password);
        $data->role = $request->role;
        $data->update();
    
        return redirect('/pengelolaan')->with('success', 'berhasi edit pengelolaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //function hapus data pengelolaan
        $data = User::findOrFail($id);
        $data->delete();
        return redirect('/pengelolaan')->with('error', 'berhasil hapus pengelola');
    }
}
