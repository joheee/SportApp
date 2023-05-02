<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transaction_id'    => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
            'user_id'           => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true],
            'product_id'        => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true],
            'ammount'           => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true],
            'transaction_date'  => ['type' => 'TIMESTAMP', 'defaultExpression' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('transaction_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'product_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
