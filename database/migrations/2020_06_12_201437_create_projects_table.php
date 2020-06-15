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
            $table->bigIncrements('id');


            $table->string('imageb')->nullable();
              $table->string('images')->nullable();
               $table->string('urlb')->nullable();
                $table->string('urls')->nullable();
            $table->integer('type')->nullable();
            $table->integer('order')->nullable();

            $table->timestamps();
            $table->dateTime('deleted_at', 0)->nullable();
          
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
