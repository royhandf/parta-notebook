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
                'alamat' => 'Jl. Kebon Jeruk No. 123 RT 01 RW 02, Kec. Bogor Selatan, Kota Bogor, Jawa Barat, 16123',
                'no_telp' => '6281283635368',
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
                'alamat' => 'Jl. User No. 1',
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
                'alamat' => 'Jl. User No. 2',
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
