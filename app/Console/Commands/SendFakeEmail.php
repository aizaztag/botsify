<?php

namespace App\Console\Commands;

use App\Traits\UserTrait;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendFakeEmail extends Command
{
    use UserTrait;
    /**
     * The name and sThe emails are send successfully!
    ignature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send_fake';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending emails to the fake users.';

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
        $users =  User::all();
        $this->calculate_sum();

        foreach ($users as $user) {
            Mail::send('emails.fake_users', $data =array(),  function ($message) use($user)  {
                $message->to($user->email)->subject('xxx');
                $message->from( 'xxx@gmail.com');
            } );
        }
         $this->info('The fake emails are send successfully!');

       /* Mail::send('emails.fake_users', $data =array(),  function ($message)  {
            $message->to('xxx@gmail.com')->subject('xxx');
            $message->from( 'xxx@gmail.com');
        } );

        $this->info('The fake emails are send successfully!');*/

    }
}
