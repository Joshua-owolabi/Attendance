<?php

namespace App\Console\Commands;

use Exception;
use App\models\Applicant;
use App\Mail\ResendCredencials;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class resendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resendmail:password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resend password credencials to new members ';

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
        $unverified_users = Applicant::where('verified', 0)->get();

        if ($unverified_users) {
            foreach ($unverified_users as $user) {
                try {
                    Mail::to($user->email)->send(new ResendCredencials($user));
                    DB::table('applicants')->where('id', $user->id)->update([
                        'verified' => 1,
                    ]);
                    echo "Mail Successfully Sent";
                } catch (Exception $ex) {
                    echo $ex;
                }
            }
        }
    }
}
