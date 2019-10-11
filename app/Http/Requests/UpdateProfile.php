<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
{
 /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */
 public function authorize()
 {
  return true;
 }

 /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
 public function rules()
 {
  return [
   'level'        => 'sometimes|string',
   'gender'       => 'sometimes|string',
   'hall'         => 'sometimes|string',
   'department'   => 'sometimes|string',
   'room_number'  => 'sometimes|string',
   'phone_number' => 'sometimes|regex:/[0-9]{11}/',
   'about_me'     => 'nullable|string',
   'avatar'       => 'sometimes|image|mimes:jpeg,bmp,jpg,png|max:2048',
  ];
 }

 public function messages()
 {
  return [
   'avatar.image'       => 'Upload an actual image please!',
   'avatar.mimes'       => 'Incorrect format!',
   'avatar.max'         => 'File too large !',
   'phone_number.regex' => 'Phone number must be 11 digits',
  ];
 }
}