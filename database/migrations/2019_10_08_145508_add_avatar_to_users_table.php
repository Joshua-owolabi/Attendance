<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatarToUsersTable extends Migration
{
 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up()
 {
  Schema::table('users', function (Blueprint $table) {
   //
   $table->string('avatar_link')->default('https://res.cloudinary.com/coderoute/image/upload/v1570550803/sanctuary/avatar_oi9hx9.png');
  });
 }

 /**
  * Reverse the migrations.
  *
  * @return void
  */
 public function down()
 {
  Schema::table('users', function (Blueprint $table) {
   //
  });
 }
}