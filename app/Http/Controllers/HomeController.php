<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //menuju halaman beranda
        $kategori = Kategori::all();
        $data = Menu::all();

        //jika owner akan diarahkan ke home dan admin ke order
        if (Auth::user()->role == 'owner'){
            return view('home', compact('data','kategori') );
        }elseif (Auth::user()->role == 'admin'){
            return redirect ('order');
        }
    }
    public function home()
    {
        //menuju halaman home untuk admin
        $kategori = Kategori::all();
        $data = Menu::all();
        return view('home', compact('data','kategori') );
    }
}
