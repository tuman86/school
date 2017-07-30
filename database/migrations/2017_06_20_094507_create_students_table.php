<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('students', function (Blueprint $table) {
          //
          $table->increments('id');
          $table->string('first_name', 255);
          $table->string('last_name', 255);
          $table->string('email', 255)->unique();
          $table->string('gender', 255);
          $table->string('admission_number', 255);
          $table->datetime('date_of_birth');
          $table->datetime('admission_date');
          $table->text('address');
          $table->string('city', 255);
          $table->string('state', 255);
          $table->string('country', 255);
          $table->string('zip_code', 255);
          $table->string('aadhar_number', 255);
          $table->string('bank_account_number', 255);
          $table->string('ifsc_code', 255);
          $table->text('comments');
          $table->string('category', 255);
          $table->string('religion', 255);
          $table->string('mothier_tongue', 255);
          $table->string('rte_act', 255);
          $table->string('medium_instruction', 255);
          $table->string('house', 255);
          $table->string('session', 255);
          $table->string('class', 255);
          $table->string('section', 255);
          $table->string('nationality', 255);
          $table->string('student_photo', 255);
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
        Schema::dropIfExists('students');
    }
}
