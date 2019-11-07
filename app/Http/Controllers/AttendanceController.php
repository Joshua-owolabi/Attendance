<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Carbon\Carbon;
use App\models\Attendance;
use Illuminate\Http\Request;
use App\models\AttendancePicking;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    //

    public function index()
    {

        return view('admin.attendance');
    }


    public function pick_date(Request $request)
    {
        // first fetch current loggedin user
        $loggedin_user = auth()->user();

        // create a new attendance pick date
        DB::beginTransaction();
        try {
            $set_attendance_date = AttendancePicking::create([
                'user_id' => $loggedin_user->id,
                'att_date' => $request->att_date,
            ]);
            // delete all data from attendance table
            DB::table('attendances')->delete();
            // first fetch all users
            $users = User::all();
            // loop through all users
            if ($users) {
                // fill attendance table with users data
                foreach ($users as $user) {
                    $attendace_users = Attendance::create([
                        'user_id' => $user->id,
                        'reg_no' => $user->reg_no,
                        'att_date' => $request->att_date,
                        'att_points' => 0,
                        'scanned' => 0,
                    ]);
                }
            }
            if ($set_attendance_date && $attendace_users) {
                DB::commit();
                swal()->position('top-right')->toast()->autoclose(6000)->message('Successfull', "You have successfully set attendance date, you are set to take attendance now, Thanks.", 'success');
                return redirect()->back();
            }
        } catch (Exception $ex) {
            DB::rollBack();
            swal()->position('top-right')->toast()->autoclose(6000)->message('Error Picking Date', "Problem contacting server, please try again thanks.", 'error');
            return redirect()->back();
        }
    }

    public function take_member_attendance(Request $request)
    {
        // TODO: cronjob for calculating attendance daily incase users dont attend, so attendance can reduce.
        //  find user using reg number
        $attendance_member = Attendance::where('reg_no', $request->reg_no)->first();
        //  check if time equals current time,
        if ($attendance_member) {
            $current_date = Carbon::now()->format('Y-m-d');
            if ($current_date == $attendance_member->att_date) {
                // check if user is scanned already or not
                if ($attendance_member->scanned != 1) {
                    DB::table('attendances')->where('user_id', $attendance_member->user_id)
                        ->update([
                            'scanned' => 1,
                            'att_points' => 1,
                        ]);

                    // get user total attended
                    $user_data = User::where('id', $attendance_member->user_id)->first();
                    // update users total number of attended
                    $user_data->update([
                        'no_attended' => $user_data->no_attended + 1,
                    ]);
                    $user_data->save();
                    // get total attendance created A.K.A total meetings had.
                    $total_meetings = AttendancePicking::all()->count();
                    // calculation stage
                    $current_attendance = ($user_data->no_attended / $total_meetings) * 100;
                    // update db with new attendance percentage
                    $user_data->update(['attendance' => $current_attendance]);
                    $user_data->save();
                    swal()->position('top-right')->toast()->autoclose(6000)->message('Attendance Taken', "$user_data->sur_name's attendance has been taken successfully.", 'success');
                    return redirect()->back();
                } else {
                    swal()->position('top-right')->toast()->autoclose(6000)->message('Attendance Failed', "attendance cant be taken twice for the same user, thanks.", 'error');
                    return redirect()->back();
                }
            }
        }
        swal()->position('top-right')->toast()->autoclose(6000)->message('Attendance Failed', "Attendance can't be taken today, please set attendance date for today first before proceeding.", 'error');
        return redirect()->back();
        //  check if user have been scanned already.
    }


    /*
    @author Dropcode <dropcode__>
*/

    public function reset_attendance(Request $request)
    {
        try {
            // clear all data in attendance pickings(total amount of meetings)
            DB::table('attendance_pickings')->delete();
            // clear all data in attendance table
            DB::table('attendances')->delete();
            // clear user attendance records
            DB::table('users')->where('attendance', '>', 0)->orWhere('no_attended', '>', 0)->update([
                'attendance' => 0,
                'no_attended' => 0,
            ]);
            swal()->position('top-right')->toast()->autoclose(6000)->message('Attendance Cleared', "All members attendance have been cleared.", 'success');
            return redirect()->back();
        } catch (Exception $ex) {
            swal()->position('top-right')->toast()->autoclose(6000)->message('Attendance Error', "Error clearing members attendance, please try again", 'error');
            return redirect()->back();
        }
    }
}
