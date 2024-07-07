<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'nama_produk' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'category_id' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'detail' => [
                'type' => 'TEXT'
            ],
            'stok' => [
                'type' => 'INT'
            ],
            'berat' => [
                'type' => 'DOUBLE'
            ],
            'harga' => [
                'type' => 'DOUBLE'
            ],
            'rating' => [
                'type' => 'DOUBLE'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('products', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('products', TRUE);
    }
}
