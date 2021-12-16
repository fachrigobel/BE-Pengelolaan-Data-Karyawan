<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nip'                => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'nama'           => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat'   => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'nohp'     => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'role'   => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status'   => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at'   => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'updated_at'   => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('nip', true);
        $this->forge->createTable('karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('karyawan');
    }
}
