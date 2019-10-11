<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantStoreRequest extends FormRequest
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
   'sur_name'       => 'required|string',
   'first_name'     => 'required|string',
   'last_name'      => 'required|string',
   'email'          => 'required|email|unique:applicants|max:255',
   'gender'         => 'required',
   'level'          => 'required',
   'department'     => 'required',
   'phone_number'   => 'sometimes|regex:/[0-9]{11}/',
   'hall'           => 'required',
   'room_number'    => 'required|size:4',
   'joining_reason' => 'required',
   'dob'            => 'required',
  ];
 }

 public function messages()
 {
  return [
   'email.required'       => 'Email or Webmail is required!',
   'first_name.required'  => 'First Name is required!',
   'last_name.required'   => 'Last Name is required!',
   'sur_name.required'    => 'Surname is required!',
   'room_number.required' => 'Your Room Number is required!',
   'phone_number.regex'   => 'Phone number must be 11 digits',
  ];
 }
}