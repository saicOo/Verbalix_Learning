<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('video');
            $table->boolean('active_quiz')->default(0)->comment('0=> Inactive, 1=>Active');
            $table->string('attached')->nullable();
            $table->string('image')->nullable();
            $table->enum('semester',['Semester 1','Semester 2']);
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels');
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
        Schema::dropIfExists('units');
    }
}
