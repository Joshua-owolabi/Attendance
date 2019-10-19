<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\models\AttendancePicking;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;
use Softon\SweetAlert\Facades\SWAL;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\UpdateProfile;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  //

  public function index(Request $request)
  {
    $users = User::where('user_rank', '!=', 'developer')->paginate(20);
    $total_attendance = AttendancePicking::all()->count();
    return view('admin.users', ['users' => $users, 'total_attendance' => $total_attendance]);
  }

  public function update_profile(UpdateProfile $request)
  {
    // dd($request);
    // validate user values
    $data           = $request->validated();
    $user           = auth()->user();
    $hashedPassword = $user->password;
    // check for image request
    if ($request->hasFile('avatar')) {
      $avatar_image = $request->file('avatar');
      // if there is an image upload then process image to cloud
      try {
        Cloudder::upload($avatar_image, '', array('folder' => 'sanctuary'));
        $avatar_link = Cloudder::getResult();
      } catch (\Cloudder\Cloudinary\Error $ex) {
        return redirect()->back();
        swal()->position('top-right')->toast()->autoclose(8000)->message('Upload Error', "Couldn't connect to server, please check that your connected to the internet", 'success');
      }

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
              'password'     => Hash::make($data['password']),
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
            'password'     => Hash::make($new_password),
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

  public function admin_update_member(Request $request)
  {
    // dd($request);
    // find user by id
    $user = User::findOrFail($request->user_id);
    // update user rank
    $user->update(['user_rank' => $request->user_rank, 'sub_unit' => $request->sub_unit]);
    $user->save();
    swal()->position('top-right')->toast()->autoclose(6000)->message('Member rank updated', " $user->sur_name's Rank has been updated successfully!!", 'success');
    return redirect()->back();
  }

  public function search_members(SearchRequest $request)
  {
    // dd($request);
    // validate search query
    $request->validate([
      'query' => 'required|min:3'
    ]);
    // get search value
    $query = $request->input('query');
    // find search value
    $members = User::where('sur_name', 'like', "$query")
      ->orWhere('first_name', 'like', "$query")
      ->orWhere('sub_unit', 'like', "$query")
      ->orWhere('last_name', 'like', "$query")
      ->paginate(10);
    // return search results and query
    return view('admin.search')->with(['members' => $members, 'query' => $query]);
  }

  public function view_member($id)
  {
    $member = User::findOrFail($id);
    return view('admin.view-member')->with('member', $member);
  }
  public function delete_member(Request $request)
  {
    $member = User::findOrFail($request->user_id);
    // dd($member);
    DB::table('applicants')->where('email', $member->email)->delete();
    DB::table('users')->where('id', $member->id)->delete();
    swal()->position('top-right')->toast()->autoclose(6000)->message('Member Removed !', " Member Removed Successfully!!", 'success');
    return redirect()->back();
  }
}
