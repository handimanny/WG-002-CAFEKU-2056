<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'=> 'owner',
            'email'=> 'owner@mail.com',
            'password'=> Hash::make('owner@mail.com'),
            'role'=> 'owner',
        ]);

        User::create([
            'name'=> 'admin',
            'email'=> 'admin@mail.com',
            'password'=> Hash::make('admin@mail.com'),
            'role'=> 'admin',
        ]);
        
        Kategori::create([
            'Nama'=> 'Makanan',
        ]);
        Kategori::create([
            'Nama'=> 'Minuman',
        ]);

        Menu::create([
            'nama'=> 'Amerikano',
            'foto'=> 'menu/foto/IeP57aWp4uxhwjUaEgjl6icUBxx1vSrHtXD03qwm.jpg',
            'harga'=> '50000',
            'keterangan'=> 'Lorem ipsum dolor sit amet',
            'kategori_id'=> '2',
        ]);
        Menu::create([
            'nama'=> 'Cappuchino',
            'foto'=> 'menu/foto/KUI8A3BaTXUda6BBYLzwq6KE68358i3n8XsMsH16.jpg',
            'harga'=> '50000',
            'keterangan'=> 'Lorem ipsum dolor sit amet',
            'kategori_id'=> '2',
        ]);
        Menu::create([
            'nama'=> 'V60',
            'foto'=> 'menu/foto/KUI8A3BaTXUda6BBYLzwq6KE68358i3n8XsMsV60.jpg',
            'harga'=> '50000',
            'keterangan'=> 'Lorem ipsum dolor sit amet',
            'kategori_id'=> '2',
        ]);
    }
}
