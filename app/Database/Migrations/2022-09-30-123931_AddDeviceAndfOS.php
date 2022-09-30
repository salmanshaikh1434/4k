<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDeviceAndfOS extends Migration
{
    public function up()
    {
        $this->forge->addColumn(
            'devices',
            [
                'browser' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'os' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ]
            ]
        );
    }

    public function down()
    {
        //
    }
}
