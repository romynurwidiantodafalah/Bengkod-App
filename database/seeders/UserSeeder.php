<?php


namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        [
            'name' => 'Romy',
            'alamat' => 'Jl ini',
            'no_hp' => '081234567',
            'role' => 'dokter',
            'email' => 'romy@gmail.com',
            'password' => '12341234'
        ],
[
            'name' => 'Romz',
            'alamat' => 'Jl itu',
            'no_hp' => '087654321',
            'role' => 'pasien',
            'email' => 'romz@gmail.com',
            'password' => '12341234'
        ],
        ];
        foreach($data as $d){
            User::create([
                'name' => $d['name'],
                'alamat' => $d['alamat'],
                'no_hp' => $d['no_hp'],
                'role' => $d['role'],
                'email' => $d['email'],
                'password' => bcrypt($d['password']),
            ]);
        }
    }
}
