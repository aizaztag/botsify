<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailJob;
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
        $this->calculate_sum();
        dispatch(new SendEmailJob());
        $this->info('The fake emails are send successfully!');
    }
}
