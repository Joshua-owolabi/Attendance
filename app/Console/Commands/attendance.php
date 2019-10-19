<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use App\models\AttendancePicking;

class attendance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:recheck';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check members attendance daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // fetch all users number attended
        $users = User::all();
        // dd($users);
        // fetch all attendance pickings 
        $total_meetings = AttendancePicking::all()->count();
        // dd($total_meetings);
        if ($users) {
            foreach ($users as $user) {
                $current_attendance = ($user->no_attended / $total_meetings) * 100;
                // update db with new attendance percentage
                $user->update(['attendance' => $current_attendance]);
                $user->save();
            }
            echo "Attendance checked & updated successfully";
        }
    }
}
