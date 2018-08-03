<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMemberColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function($table) {
            $table->enum('sex', array('male', 'female'));
            $table->string('house_number');
            $table->string('street');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->longText('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('sex');
            $table->dropColumn('house_number');
            $table->dropColumn('street');
            $table->dropColumn('barangay');
            $table->dropColumn('city');
            $table->dropColumn('province');
            $table->dropColumn('note');
        });
    }
}
