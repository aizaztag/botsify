<?php

namespace App\Http\Controllers;

use App\Traits\UserTrait;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use UserTrait;

    public function calculate_sum_update_to_users_table()
    {
         $this->calculate_sum();
    }

    public function send_fake_email_users()
    {
        $users =  User::all();
        //dd($users);
        foreach ($users as $user){
            echo ($user->email);
        }

    }
}
