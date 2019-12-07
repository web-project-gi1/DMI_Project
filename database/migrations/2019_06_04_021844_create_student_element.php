<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentElement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_element', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('studentId')->unsigned();
            $table->foreign('studentId')->references('id')->on('students');
            $table->integer('elementId')->unsigned();
            $table->foreign('elementId')->references('id')->on('elements');
            $table->float('DS_Mark',4,2)->nullable();
            $table->float('exam_Mark',4,2)->nullable();
            $table->integer('absence')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_element');
    }
}
