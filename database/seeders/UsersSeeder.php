<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Admin',
            'telp' => '088809003033',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'alamat' => 'Bogor',
            'password' => Hash::make('123123'),
        ]);
        User::create([
            'nama' => 'Petugas',
            'telp' => '087720645336',
            'role' => 'petugas',
            'email' => 'petugas@gmail.com',
            'alamat' => 'Puncak',
            'password' => Hash::make('124124'),
        ]);
    }
}
