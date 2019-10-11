<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantStoreRequest;
use App\Mail\SendMailable;
use App\models\Applicant;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail;

class ApplicantController extends Controller
{
 //

 public function index()
 {
  return view('Applicants.index');
 }

 public function store(ApplicantStoreRequest $request)
 {
  // validate users
  $data = $request->validated();
  // Auto generate password for users
  $random           = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
  $password         = substr($random, 0, 6);
  $data['password'] = $password;
  DB::beginTransaction();
  try {
   $applicant = Applicant::create([
    'sur_name'       => $data['sur_name'],
    'first_name'     => $data['first_name'],
    'last_name'      => $data['last_name'],
    'gender'         => $data['gender'],
    'email'          => $data['email'],
    'level'          => $data['level'],
    'department'     => $data['department'],
    'hall'           => $data['hall'],
    'room_number'    => $data['room_number'],
    'joining_reason' => $data['joining_reason'],
    'dob'            => $data['dob'],
    'other_names'    => $request->other_names,
    'phone_number'   => $request->phone_number,
    'suggestions'    => $request->suggestions,
    'password'       => $password,
   ]);

   $member = User::create([
    'sur_name'     => $data['sur_name'],
    'first_name'   => $data['first_name'],
    'last_name'    => $data['last_name'],
    'gender'       => $data['gender'],
    'email'        => $data['email'],
    'level'        => $data['level'],
    'department'   => $data['department'],
    'hall'         => $data['hall'],
    'room_number'  => $data['room_number'],
    'dob'          => $data['dob'],
    'other_names'  => $request->other_names,
    'phone_number' => $request->phone_number,
    'password'     => Hash::make($password),
   ]);
   if ($applicant && $member) {
    DB::commit();
    try {
     Mail::to($data['email'])->send(new SendMailable($data));
     swal()->position('top-right')->toast()->autoclose(6000)->message('Successful Application', 'Your registration was successful, Please check your mail for your login details thanks.', 'success');
     $applicant->update(['verified' => 1]);
     return redirect()->back();
    } catch (Exception $e) {
     swal()->position('top-right')->toast()->autoclose(6000)->message('Success Email Not Sent', "Your registration was successful, but we are so sorry we couldn't send your login details now, we will send your details within 24hrs thanks.", 'warning');
     return redirect()->back();
    }
   }
  } catch (Exception $ex) {
   DB::rollback();

  }
 }
}