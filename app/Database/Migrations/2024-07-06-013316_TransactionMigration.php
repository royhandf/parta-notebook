<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransactionMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'user_id' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'kode_transaksi' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'note'=> [
                'type' => 'TEXT',
                'null' => true
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'success', 'canceled']
            ],
            'total_bayar' => [
                'type' => 'DOUBLE',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addUniqueKey('kode_transaksi');
        $this->forge->createTable('transactions', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('transactions', TRUE);
    }
}
