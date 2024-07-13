<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "VARCHAR",
                'constraint' => 32,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint'     => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint'     => 255,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint'     => 255,
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint'     => ["Admin", "User"],
                'default' => "User"
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint'     => 255,
            ],
            'kota_id' => [
                'type' => 'VARCHAR',
                'constraint'     => 32,
            ],
            'provinsi_id' => [
                'type' => 'VARCHAR',
                'constraint'     => 32,
            ],
            'kode_pos' => [
                'type' => 'VARCHAR',
                'constraint'     => 10,
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint'     => 25,
            ],
            'bank' => [
                'type' => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'no_rek' => [
                'type' => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('users', TRUE);
    }
}
