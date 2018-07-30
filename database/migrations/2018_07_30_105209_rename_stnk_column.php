<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameStnkColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authors', function(Blueprint $table) {
            $table->renameColumn('name', 'author_name');
        });
    }


    public function down()
    {
        Schema::table('authors', function(Blueprint $table) {
            $table->renameColumn('author_name', 'name');
        });
    }
}
