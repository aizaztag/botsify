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

        //$this->calculate_sum();

        //Mail::to('taylor@laravel.com')->later('1');


        /*Mail::send('emails.fake_users', $data =array(),  function ($message)  {
            $message->to('xxx@gmail.com')->subject('xxx');
            $message->from( 'xxx@gmail.com');
        } );*/

         $users =  User::all();
         foreach ($users as $user) {
             Mail::send( 'emails.fake_users', $data =array(),  function ($message) use($user)  {
                 $message->to($user->email)->subject('xxx');
                 $message->from( 'xxx@gmail.com');
             } );
             sleep(3);
         }
/*

        Mail::send('emails.fake_users', $data =array(),  function ($message)  {
            $message->to('xxx@gmail.com')->subject('xxx');
            $message->from( 'xxx@gmail.com');
        } );*/


    }
}
