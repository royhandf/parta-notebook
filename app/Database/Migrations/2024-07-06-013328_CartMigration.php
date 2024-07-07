<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CartMigration extends Migration
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
            'product_id' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'qty' => [
                'type' => 'INT'
            ],
            'total_harga' => [
                'type' => 'double'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('carts', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('carts', TRUE);
    }
}
