<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
            //dd(Auth::user());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        /*$row = \ShoppingCart::add('PLZ975778', 'Product Name', 5, 100.00, ['color' => 'red', 'size' => 'M']);
        dd($row);*/

        $groups = auth()->user()->groups;

        $users = User::where('id', '<>', auth()->user()->id)->get();
        $user = auth()->user();

        //return view('welcome', ['groups' => $groups, 'users' => $users, 'user' => $user]);
        return view('home');
    }
}
