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
        //Artisan::call('email:send_fake');
    }

    public function testQueue()
    {
        //dispatch(new UserJob());
        dispatch(new SendEmailJob());

    }

    public function queue()
    {
        //$exitCode = Artisan::call('queue:work');

        echo 'queue:work';
    }

    public function test()
    {
        dd(User::all()->pluck('email' , 'name'));
        $users =  User::all();
        foreach ($users as $user)$emails[]  = $user->email;
            echo '<pre>' ; print_r($emails); die;
    }
}
