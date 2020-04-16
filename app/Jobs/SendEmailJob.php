<?php

namespace App\Jobs;

use App\Mail\SendMailable;
use App\Traits\UserTrait;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use UserTrait , Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         $users =  User::all();
         foreach ($users as $user) {
             Mail::send( 'emails.fake_users', $data =array(),  function ($message) use($user)  {
                 $message->to($user->email)->subject('xxx');
                 $message->from( 'xxx@gmail.com');
             });
             sleep(3);
         }
    }
}