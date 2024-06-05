<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsAdminToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     // Add the 'is_admin' column to the 'users' table.
        // This column will be used to distinguish between regular users and admins.
        // The column is of type boolean and will default to 0 (regular user).
        // The column is added immediately after the 'password' column.
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

         $table->boolean('is_admin')->default(0)->after('password')->comment('0 for user, 1 for admin');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->dropColumn('is_admin');

        });
    }
}
