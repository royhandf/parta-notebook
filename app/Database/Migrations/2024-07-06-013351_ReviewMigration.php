<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReviewMigration extends Migration
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
            'star' => [
                'type' => 'INT',
                'default' => 0
            ],
            'description' => [
                'type' => 'TEXT'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('reviews', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('reviews', TRUE);
    }
}
