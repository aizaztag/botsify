<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';

   /* public function users()
    {
        return $this->belongsToMany('App\User' , 'users_subscription' , 'subscription_id' , 'user_id');
    }*/
}
