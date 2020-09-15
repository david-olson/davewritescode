<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_id')->nullable();
            $table->string('title');
            $table->boolean('is_blue_ion');
            $table->string('tech')->nullable();
            $table->string('role')->nullable();
            $table->string('slug');
            $table->integer('order');
            $table->string('site_address')->nullable();
            $table->string('declaration')->nullable();
            $table->text('description');
            $table->text('challenges');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
