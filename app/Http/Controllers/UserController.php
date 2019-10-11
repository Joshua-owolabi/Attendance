<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use JD\Cloudder\Facades\Cloudder;
use Softon\SweetAlert\Facades\SWAL;

class UserController extends Controller
{
 //

 public function index(Request $request)
 {
  $users = User::where('user_rank', '=', 'member')
   ->where('user_rank', '=', 'admin')
   ->where('user_rank', '=', 'exco')
   ->get();
  return view('admin.users');
 }

 public function update_profile(UpdateProfile $request)
 {
  dd($request);
  // validate user values
  $data           = $request->validated();
  $user           = auth()->user();
  $hashedPassword = $user->password;
  // check for image request
  if ($request->hasFile('avatar')) {
   $avatar_image = $request->file('avatar');
   // if there is an image upload then process image to cloud
   Cloudder::upload($avatar_image, '', array('folder' => 'sanctuary'));
   $avatar_link = Cloudder::getResult();
   //  $user->update(['avatar_link' => $avatar_link->secure_url]);
   // compare for user passwords
   if ($request->password) {
    if (Hash::check($request->password, $hashedPassword)) {
     // check if password & comfirm password are the same
     if ($request->new_password === $request->confirm_password) {
      $data['password'] = $request->new_password;
      DB::table('users')->where('id', $user->id)->update([
       'level'        => $data['level'],
       'department'   => $data['department'],
       'gender'       => $data['gender'],
       'room_number'  => $data['room_number'],
       'hall'         => $data['hall'],
       'phone_number' => $data['phone_number'],
       'about_me'     => $data['about_me'],
       'avatar_link'  => $avatar_link['secure_url'],
       'password'     => $data['password'],
      ]);
      swal()->position('top-right')->toast()->autoclose(6000)->message('Profile Updateds', 'Your profile has been succeesfully updated !!', 'success');
      return redirect()->back();
     } else {
      swal()->position('top-right')->toast()->autoclose(4000)->message('Password Mismatch', 'Passwords does not match, try again.', 'error');
      return redirect()->back()->with('error', 'Password does not match');
     }
    } else {
     swal()->position('top-right')->toast()->autoclose(4000)->message('Incorrect Password', 'Incorrect old password, try again.', 'error');
     return redirect()->back()->with('error', 'Incorrect password');
    }
   }

   DB::table('users')->where('id', $user->id)->update([
    'level'        => $data['level'],
    'department'   => $data['department'],
    'gender'       => $data['gender'],
    'room_number'  => $data['room_number'],
    'hall'         => $data['hall'],
    'phone_number' => $data['phone_number'],
    'about_me'     => $data['about_me'],
    'avatar_link'  => $avatar_link['secure_url'],
   ]);
   swal()->position('top-right')->toast()->autoclose(6000)->message('Profile Updateds', 'Your profile has been succeesfully updated !!', 'success');
   return redirect()->back();
  }
  if ($request->password) {
   // check for password then compare password
   if (Hash::check($request->password, $hashedPassword)) {
    // check if password & comfirm password are the same
    if ($request->new_password === $request->confirm_password) {
     $new_password = $request->new_password;
     // if password exists verify password then update db with request inputs
     DB::table('users')->where('id', $user->id)->update([
      'level'        => $data['level'],
      'department'   => $data['department'],
      'gender'       => $data['gender'],
      'room_number'  => $data['room_number'],
      'hall'         => $data['hall'],
      'phone_number' => $data['phone_number'],
      'about_me'     => $data['about_me'],
      'password'     => $new_password,
     ]);
     // return success
     swal()->position('top-right')->toast()->autoclose(6000)->message('Profile Updateds', 'Your profile has been succeesfully updated !!', 'success');
     return redirect()->back();
    } else {
     swal()->position('top-right')->toast()->autoclose(6000)->message('Password Mismatch', 'Passwords does not match, try again.', 'error');
     return redirect()->back()->with('error', 'Password does not match');
    }
   } else {
    swal()->position('top-right')->toast()->autoclose(6000)->message('Incorrect Password', 'Incorrect old password, try again.', 'error');
    return redirect()->back()->with('error', 'Incorrect password');

   }
  }

  // if user doesnt have password or image
  DB::table('users')->where('id', $user->id)->update([
   'level'        => $data['level'],
   'department'   => $data['department'],
   'gender'       => $data['gender'],
   'room_number'  => $data['room_number'],
   'hall'         => $data['hall'],
   'phone_number' => $data['phone_number'],
   'about_me'     => $data['about_me'],
  ]);

  swal()->position('top-right')->toast()->autoclose(6000)->message('Profile Updateds', 'Your profile has been succeesfully updated !!', 'success');
  return redirect()->back();
 }
}