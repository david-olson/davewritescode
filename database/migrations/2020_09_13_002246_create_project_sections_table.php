<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->bigInteger('project_id')->unsigned();
            $table->string('type');
            $table->integer('order');
            $table->bigInteger('media_id')->unsigned()->nullable();
            $table->text('content')->nullable();
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
        Schema::dropIfExists('project_sections');
    }
}
