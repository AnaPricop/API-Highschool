<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_number');
            $table->foreign('registration_number')->references('registration_number')
                ->on('students')->onDelete('cascade');
//            $table->integer('registration_number');
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')
                ->on('subjects')->onDelete('cascade');
            $table->integer('value');
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
        Schema::dropIfExists('grades');
    }
}
