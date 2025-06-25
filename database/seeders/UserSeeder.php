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
        // [
        //     'name' => 'Romy',
        //     'alamat' => 'Jl ini 1',
        //     'no_hp' => '081234567',
        //     'role' => 'dokter',
        //     'email' => 'romy@gmail.com',
        //     'password' => '12341234'
        // ],
        // [
        //     'name' => 'Romy1',
        //     'alamat' => 'Jl ini 5',
        //     'no_hp' => '08123456745',
        //     'role' => 'dokter',
        //     'email' => 'romy1@gmail.com',
        //     'password' => '12341234'
        // ],
        // [
        //     'name' => 'Romy2',
        //     'alamat' => 'Jl ini 9',
        //     'no_hp' => '0812345987',
        //     'role' => 'dokter',
        //     'email' => 'romy2@gmail.com',
        //     'password' => '12341234'
        // ],
        // [
        //     'name' => 'Romz',
        //     'alamat' => 'Jl itu 2',
        //     'no_hp' => '087654321',
        //     'role' => 'pasien',
        //     'email' => 'romz@gmail.com',
        //     'password' => '12341234'
        // ],
        // [
        //     'name' => 'Romz1',
        //     'alamat' => 'Jl itu 4',
        //     'no_hp' => '08765432123',
        //     'role' => 'pasien',
        //     'email' => 'romz1@gmail.com',
        //     'password' => '12341234'
        // ],
        // [
        //     'name' => 'Admin',
        //     'alamat' => 'Jl Admin',
        //     'no_hp' => '0800000000',
        //     'role' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => 'admin1234'
        // ],

        [
            'name' => 'drg. Romyy',
            'alamat' => 'Jl ini 1',
            'no_hp' => '081234567',
            'role' => 'dokter',
            'id_poli' => 3,
            'email' => 'romyy@gmail.com',
            'password' => '12341234'
        ],
        [
            'name' => 'dr. Romzz',
            'alamat' => 'Jl ini 2',
            'no_hp' => '08123456745',
            'role' => 'dokter',
            'id_poli' => 2,
            'email' => 'romzz@gmail.com',
            'password' => '12341234'
        ],
        [
            'name' => 'Romzzz',
            'alamat' => 'Jl itu 2',
            'no_hp' => '087654321',
            'role' => 'pasien',
            'id_poli' => null, // pasien tidak perlu
            'email' => 'romzzz@gmail.com',
            'password' => '12341234'
        ],
        ];
        foreach($data as $d){
            User::create([
                'name' => $d['name'],
                'alamat' => $d['alamat'],
                'no_hp' => $d['no_hp'],
                'role' => $d['role'],
                'id_poli' => $d['id_poli'],
                'email' => $d['email'],
                'password' => bcrypt($d['password']),
            ]);
        }
    }
}
