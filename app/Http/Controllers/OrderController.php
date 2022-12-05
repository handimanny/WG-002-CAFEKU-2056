<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //function menuju form order
        return view('order');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //function mengambil data dari form order dan menampilkannya ke order status
        $total_pesanan = 0;
        if($request->pesanan != null){
            $pesanan = $request->pesanan;
            $jumlah_pesanan = count($pesanan);
        }
        foreach ($pesanan as $p ) {
            $total_pesanan += $p;
        }
        $status = $request->status;
        $pesan = new Pembayaran($status,$total_pesanan);
        $bayar = $pesan->bayar();
        $data = [
            'nama' => $request->nama,
            'jumlah_pesanan' => $jumlah_pesanan,
            'total_pesanan' => $total_pesanan,
            'status' => $status,
            'diskon' => $pesan->diskon($status,$total_pesanan),
            'total_pembayaran' => $bayar
        ];
        return view('order',compact('data'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

// method diskon()
interface Pesan{
    public function diskon();
}

//class Diskon implements Pesan
class Diskon implements Pesan{
    public $status;
    public $total_pesanan;
    public function __construct($status,$total_pesanan)
    {
        $this->status = $status;
        $this->total_pesanan = $total_pesanan;
    }
    //function untuk menghitung diskon
    public function diskon()
    {
        if($this->status == 'member' && $this->total_pesanan >=100000){
            return $this->total_pesanan * (20/100);
        }elseif($this->status == 'member' && $this->total_pesanan < 100000){
            return $this->total_pesanan * (10/100);
        }else{
            return $this->total_pesanan * (0/100);
        }
    }
}

//class pembayaran extends Diskon
class Pembayaran extends Diskon{
    public function bayar()
    {
        return (int)$this->total_pesanan - (int)$this->diskon($this->status,$this->total_pesanan);
    }
}