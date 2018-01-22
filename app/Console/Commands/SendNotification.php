<?php

namespace App\Console\Commands;

use App\CMSConfig;
use App\Session;
use DateTime;
use Illuminate\Console\Command;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will send session notification';

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
        $session_notifications = Session::whereDate('s_date', new DateTime('tomorrow'))->join('patients', 'sessions.patient_id', '=', 'patients.id')->get();
        $config = CMSConfig::first();
        foreach ($session_notifications as $session_notification) {
            if($session_notification['email']!=null) {
                \Mail::send('email.notify', ['name' => $session_notification['name'], 'date' => $session_notification['s_date']], function ($message) use ($session_notification) {
                    $message->to($session_notification['email'], $session_notification['name'])
                        ->subject('Obavijest o zakazanom terminu');
                });
            }
            else{
                \Mail::send('email.callpatient', ['name' => $session_notification['name'], 'lname' => $session_notification['lname'], 'date' => $session_notification['s_date'], 'phone' => $session_notification['phone']], function ($message) use ($config) {
                    $message->to($config->email)
                        ->subject('Obavijest o zakazanom terminu');
                });
            }
        }
    }
}
