<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolments', function (Blueprint $table) {
            //$table->integer('sid')->index()->primary();
            //$table->foreign('sid')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
              //$table->foreignId('sid')->primary()->constrained('students');
              $table->foreignId('stid')->constrained('students');
            //$table->foreignId('mid')->constrained('modules')->onUpdate('cascade')->onDelete('cascade');
            $table->string('mid',8)->index();
            //$table->foreign('mid')->primary()->references('id')->on('modules')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mid')->references('id')->on('modules')->onDelete('cascade')->onUpdate('cascade');
            
            //$table->string('mid',8)->primary();
            //$table->foreign('mid')->references('id')->on('modules')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreignId('module_id')->constrained('modules');
            //$table->integer('stid')->primary();
            //$table->integer('mid')->primary();
            $table->foreignId('lid')->constrained('lecturers');
            $table->string('semester');           
            $table->integer('mark');
            $table->timestamps();
            $table->primary(['stid','mid','semester']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolments');
    }
}
