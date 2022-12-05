<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'menus'; //for relasi
  
    public function kategori() //for relasi
    {
        return $this->belongsTo(Kategori::class); //for relasi
    }
}
