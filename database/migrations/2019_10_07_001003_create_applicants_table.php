<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up()
 {
  Schema::create('applicants', function (Blueprint $table) {
   $table->bigIncrements('id');
   $table->string('sur_name');
   $table->string('first_name');
   $table->string('last_name');
   $table->string('other_names')->nullable();
   $table->string('email')->unique();
   $table->string('gender');
   $table->integer('level');
   $table->string('department');
   $table->string('hall');
   $table->string('room_number');
   $table->string('joining_reason');
   $table->string('suggestions')->nullable();
   $table->date('dob');
   $table->bigInteger('phone_number')->nullable();
   $table->integer('verified')->default(0);
   $table->timestamp('email_verified_at')->nullable();
   $table->string('password');
   $table->rememberToken();
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
  Schema::dropIfExists('applicants');
 }
}