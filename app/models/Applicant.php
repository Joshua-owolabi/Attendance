<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
 //
 protected $fillable = [
  'sur_name',
  'first_name',
  'last_name',
  'other_names',
  'gender',
  'level',
  'department',
  'hall',
  'room_number',
  'phone_number',
  'joining_reason',
  'suggestions',
  'email',
  'password',
  'dob',
 ];
}