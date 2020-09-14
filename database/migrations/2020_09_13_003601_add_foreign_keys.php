<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('active_guests', function($table) {
            $table->foreign('code_id')->references('id')->on('access_codes')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('media', function($table) {
            $table->foreign('type_id')->references('id')->on('media_types')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('project_sections', function($table) {
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('projects', function($table) {
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
