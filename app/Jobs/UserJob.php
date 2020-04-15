<?php

namespace App\Jobs;

use App\Traits\UserTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class UserJob implements ShouldQueue
{
    use UserTrait ,  Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        Mail::send('emails.fake_users', $data =array(),  function ($message)  {
            $message->to('xxx@gmail.com')->subject('xxx');
            $message->from( 'xxx@gmail.com');
        } );
    }
}
