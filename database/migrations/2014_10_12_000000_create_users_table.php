<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up()
 {
  Schema::create('users', function (Blueprint $table) {
   $table->bigIncrements('id');
   $table->string('sur_name')->nullable();
   $table->string('first_name');
   $table->string('last_name');
   $table->string('other_names')->nullable();
   $table->string('email')->unique();
   $table->string('gender');
   $table->integer('level');
   $table->string('department');
   $table->string('hall');
   $table->string('room_number');
   $table->date('dob');
   $table->BigInteger('phone_number')->nullable();
   $table->enum('user_rank', ['developer', 'admin', 'exco', 'member'])->default('member');
   $table->integer('attendance')->default(0);
   $table->string('password');
   $table->timestamp('email_verified_at')->nullable();
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
  Schema::dropIfExists('users');
 }
}