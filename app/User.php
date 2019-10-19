<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
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
    'email',
    'password',
    'dob',
    'user_rank',
    'sub_unit',
    'reg_no',
    'attendance',
    'no_attended',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
}
