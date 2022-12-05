<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kategoris'; //for relasi
    
    public function menu() //for relasi
    {
        return $this->hasMany(Menu::class); //for relasi
    }
}
