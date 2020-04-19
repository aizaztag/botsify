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
         //$emails = ['xxx@gmail1' , 'xxx@gmail2.com' , 'aizaz.azzi@yahoo.com'];

         //foreach ($users as $user)$emails[] = $user->email;

        Mail::to(User::all()->pluck('email'))->send(new SendMailable());
    }

    public function getEmail()
    {
         return User::all()->pluck('email');
         //foreach ($users as $user) $user->email;
    }
}
