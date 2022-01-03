<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::create([
        //     'name' => 'Uriel Benítez',
        //     'email' => 'uriel@prueba.com',
        //     'password' => Hash::make("12345678"),
        //     'url_video' => 'https://www.instagram.com/uriel_b_medina',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ]);

        // $user2 = User::create([
        //     'name' => 'UrielBm',
        //     'email' => 'urielbm@prueba.com',
        //     'password' => Hash::make("12345678"),
        //     'url_video' => 'https://www.instagram.com/uriel_b_medina',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ]);

    }
}
