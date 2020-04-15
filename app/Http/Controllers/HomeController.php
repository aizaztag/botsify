<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Jobs\UserJob;
use App\Traits\UserTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    use UserTrait;

    //update user column calculated_sum and calling email send command
    public function calculate_sum_update_to_users_table()
    {
         $this->calculate_sum();
         dispatch(new SendEmailJob());
        //Artisan::call('email:send_fake');
    }

    public function send_fake_email_users()
    {
        dispatch(new UserJob());

    }

    public function queue()
    {
        $exitCode = Artisan::call('queue:work');
        echo 'queue:work';

    }
}
