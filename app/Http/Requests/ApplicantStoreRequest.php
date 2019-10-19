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
      'phone_number'   => 'nullable|regex:/[0-9]{11}/',
      'hall'           => 'required',
      'room_number'    => 'required|size:4',
      'joining_reason' => 'required',
      'dob'            => 'required|date|before:2005-01-01',
      'sub_unit'       => 'required',
      'reg_no'         => 'required|regex:/[0-9]{7}/',
    ];
  }

  public function messages()
  {
    return [
      'email.required'       => 'Email or Webmail is required!',
      'email.unique'       => 'This mail has been taken, incase you just registered, check your mail tomorrow for your login credencials, Thanks!',
      'first_name.required'  => 'First Name is required!',
      'last_name.required'   => 'Last Name is required!',
      'sur_name.required'    => 'Surname is required!',
      'room_number.required' => 'Your Room Number is required!',
      'phone_number.regex'   => 'Phone number must be 11 digits',
      'sub_unit.required'    => 'Select a sub unit',
      'reg_no.regex'         => 'Reg number must be 7 digits',
    ];
  }
}
