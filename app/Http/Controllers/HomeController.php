<?php

namespace App\Http\Controllers;

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
}
