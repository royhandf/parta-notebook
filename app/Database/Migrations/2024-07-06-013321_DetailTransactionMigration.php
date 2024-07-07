<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailTransactionMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'transaction_id' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'product_id' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'qty' => [
                'type' => 'INT'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('transaction_id', 'transactions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('detailtransactions', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('detailtransactions', TRUE);
    }
}
