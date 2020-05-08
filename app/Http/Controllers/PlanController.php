<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        //dd($plans);
        $users_subs = DB::select('select * from plan_user where user_id = ?', [auth()->id()]);//->pluck('user_id');
       // $users = auth()->user()->with('Subscriptions')->get();
        DB::enableQueryLog(); // Enable query log
        $users =  User::with('plans')->where('id', '33')->get();
       // dd(DB::getQueryLog()); // Show results of log
       //dd($users->Plans);

        //$userSubscriptions = UserSubscription::find('3')->with('users')->get();
           // echo '<pre>' ; print_r($userSubscriptions->users); die;
       //dd($users);
        $usr_subs =[];

        foreach ($users as $plan)
        {
           // dd($sub->subscriptions );
            //$product->skus is a collection of Sku models
            //echo ( $sub->userSubscriptions );
                foreach ($plan->plans as $s){
                   //echo '<pre>' ; print_r($s->stripe_plan);
                    $usr_subs[] =$s->stripe_plan;

                }
        }
      //  die;
        //$resultArray = json_decode(json_encode($users_subs), true);
       // dd($users);
        /*foreach ($resultArray as $item) {
            $usr_subs[] = $item['stripe_plan'];
        }*/

        return view('plans.index', compact('plans' , 'usr_subs'));
    }

    public function show(Plan $plan, Request $request)
    {

        if($request->user()->subscribedToPlan($plan->stripe_plan, 'main')) {
            return redirect()->route('home')->with('success', 'You have already subscribed the plan');
        }
        return view('plans.show', compact('plan'));
    }
}
