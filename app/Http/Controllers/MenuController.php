<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //function menuju halaman menu
        $data = Menu::all();
        return view('/menu/menu', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //function menuju form buat menu
        $kategori = Kategori::all();
        $data = Menu::all();
        return view('/menu/create', compact('data', 'kategori'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //function buat menu baru
        $validator = $request->validate([
            'nama' => 'required|string',
            'foto' => 'required|image',
            'harga' => 'required|string',
            'keterangan' => 'required|string',
            'kategori_id' => 'string'
          ]);
        $validator['foto'] = $request->file('foto')->store('menu/foto');
        Menu::create($validator);
        return redirect('/menu')->with('success', 'berhasil tambah menu');
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
        //function menuju form edit menu
        $data = Menu::findOrFail($id);
        $kategori = Kategori::all();
        return view('menu/edit', compact('data','kategori'));
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
        //function form edit atau update menu
        $data = Menu::findOrFail($id);
                if ($request->file('foto')) {
                    $file = $request->file('foto')->store('menu/foto');
                    if ($request->foto){
                        Storage::delete($data->foto);
                    }
                    $data->update([
                        'nama' => $request->nama,
                        'foto' => $file,
                        'harga' => $request->harga,
                        'keterangan' => $request->keterangan,
                        'kategori_id' => $request->kategori_id,
                    ]);
                } else {
                    $data->update([
                        'nama' => $request->nama,
                        'foto' => $data->foto,
                        'harga' => $request->harga,
                        'keterangan' => $request->keterangan,
                        'kategori_id' => $request->kategori_id
                    ]);
                }
        return redirect('/menu')->with('success', 'berhasil edit menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //function hapus kategori
        $data = Menu::findOrFail($id);
        if($data->foto){
            Storage::delete($data->foto);
        }
        $data->delete();
        return redirect('/menu')->with('error', 'berhasil hapus menu');
    }
}
