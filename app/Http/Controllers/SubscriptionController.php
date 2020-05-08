<?php

// SubscriptionController.php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Plan;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    public function create(Request $request, Plan $plan)
    {
        if($request->user()->subscribedToPlan($plan->stripe_plan, 'main')) {
            return redirect()->route('home')->with('success', 'You have already subscribed the plan');
        }
        $plan = Plan::findOrFail($request->get('plan'));

          $request->user()
            ->newSubscription('main', $plan->stripe_plan)
            ->create($request->stripeToken);

      //  $user  = User::find('33');

        auth()->user()->plans()->sync($plan , false);

       // DB::insert("insert into users_subscription ('user_id'  , 'stripe_plan') values ('3', 'dsss')", [1, 'Dayle']);
        //DB::insert('insert into users_subscription (user_id, stripe_plan) values (?, ?)', [auth()->id(), $plan->stripe_plan]);


        return redirect()->route('home')->with('success', 'Your plan subscribed successfully');
    }
}