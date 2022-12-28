<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCouponInUser extends Migration
{
    public function up()
    {
        $this->forge->addColumn(
            'usres',
            [
                'coupon' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
              
            ]
        );
    }

    public function down()
    {
        //
    }
}
