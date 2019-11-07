<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use App\models\Applicant;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ApplicantStoreRequest;

class ApplicantController extends Controller
{
    //

    public function index()
    {
        return view('Applicants.index');
    }

    public function store(ApplicantStoreRequest $request)
    {
        // TODO: Cronjob to send mail within 24hrs after exhastion of 100 mails perday.
        // validate users
        $data = $request->validated();
        // remove white space from emails.
        $data['email'] =  preg_replace('/\s/', '', $data['email']);
        $correctEmail = explode('@', $data['email']);
        if ($correctEmail[1] == 'lmu.edu.ng' || $correctEmail[1] == 'gmail.com') {

            //after removing white space check for email again before registering user
            $verifiedUser = DB::table('applicants')->where('email', $data['email'])->first();
            if ($verifiedUser) {
                swal()->position('top-right')->toast()->autoclose(10000)->message('Already Registered', "Seems you have already registered before, please check your mail within 24hrs for your login credencials thank You.", 'warning');
                return redirect()->back();
            }
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
                    'sub_unit'     => $data['sub_unit'],
                    'reg_no'       => $data['reg_no'],
                    'other_names'  => $request->other_names,
                    'phone_number' => $request->phone_number,
                    'password'     => Hash::make($password),
                ]);
                if ($applicant && $member) {
                    DB::commit();
                    try {
                        Mail::to($data['email'])->send(new SendMailable($data));
                        swal()->position('top-right')->toast()->autoclose(6000)->message('Successful Application', 'Your registration was successful, Please check your mail for your login details thanks.', 'success');
                        DB::table('applicants')->where('email', $applicant->email)->update(['verified' => 1]);
                        return redirect()->back();
                    } catch (Exception $e) {
                        swal()->position('top-right')->toast()->autoclose(6000)->message('Success Email Not Sent', "Your registration was successful, but we are so sorry we couldn't send your login details now, Please check your mail again in 10min, thanks.", 'warning');
                        return redirect()->back();
                    }
                }
            } catch (Exception $ex) {
                DB::rollback();
            }
        } else {
            swal()->position('top-right')->toast()->autoclose(10000)->message('Wrong Email', "Your Email is wrongly formatted, please try again.", 'warning');
            return redirect()->back();
        }
    }
}
