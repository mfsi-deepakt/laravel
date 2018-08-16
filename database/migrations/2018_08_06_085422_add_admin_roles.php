<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            $adminRole = Role::create([
                'name' => 'Administrator',
                'slug' => 'admin'
            ]);

            $managerRole = Role::create([
                'name' => 'Manager',
                'slug' => 'manager'
            ]);
            return true;
        }  catch( \Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    
    }
}
