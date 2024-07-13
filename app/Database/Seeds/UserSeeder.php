<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => Uuid::uuid4(),
                'nama_lengkap' => 'PT. Parta Notebook',
                'email' => 'admin@gmail.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'role' => 'Admin',
                'alamat' => 'Jl. Kebon Jeruk No. 123 RT 01 RW 02, Kec. Bogor Selatan',
                'kota_id' => '409',
                'provinsi_id' => '11',
                'kode_pos' => '61219',
                'no_telp' => '6289693963829',
                'bank' => 'BCA',
                'no_rek' => '1234567890',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'nama_lengkap' => 'User',
                'email' => 'user@gmail.com',
                'password' => password_hash('user', PASSWORD_DEFAULT),
                'role' => 'User',
                'alamat' => 'Jl. User No. 1, Kec. User',
                'kota_id' => '444',
                'provinsi_id' => '11',
                'kode_pos' => '60119',
                'no_telp' => '6281234567891',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'nama_lengkap' => 'User 2',
                'email' => 'user2@gmail.com',
                'password' => password_hash('user2', PASSWORD_DEFAULT),
                'role' => 'User',
                'alamat' => 'Jl. User No. 2, Kec. User',
                'kota_id' => '256',
                'provinsi_id' => '11',
                'kode_pos' => '65112',
                'no_telp' => '6281234567891',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($data as $user) {
            $this->db->table('users')->insert($user);
        }
    }
}
