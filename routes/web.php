<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Events\MessageSend;
use App\Events\PostPublished;
use App\Larashout\Larashout;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


Route::get('/post', function () {
    $post =  App\Post::create(['title' => 'aizaz aziz'  ,'description' => 'desddf']);
    event(new PostPublished($post));
    //event(new MessageSend('dfdfd'));


});

/*/post/create*/
Route::post('/post/create','PostController@store');


Route::get('/'   , 'HomeController@index');

Route::get('/notification', function () {


   // $row = ShoppingCart::add('PLZ9757710', 'Product Name', 5, 100.00, ['color' => 'red', 'size' => 'M']);
    $row = ShoppingCart::add('PLZ975770', 'Product Name', 5, 100.00, ['color' => 'red', 'size' => 'M']);
    ShoppingCart::update('16c4b86299a1e8d2311bacf9a3e2d081',311,22, ['name' => 'New product name']);
    //ShoppingCart::remove('16c4b86299a1e8d2311bacf9a3e2d081');
   // ShoppingCart::total(); // alias of totalPrice();

     dd(ShoppingCart::all());

   // dd(ShoppingCart::upda());


    return view('welcome2');
});

Route::get('/larashout', function() {

    Larashout::sayHello();

});

Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));
    //event(new App\Events\MessageSend('Someone'));
    return "Event has been sent!";
});


Route::resource('groups', 'GroupController');
//Route::resource('groups', 'GroupController');
Route::resource('conversations', 'ConversationController');

//Route::auth();

/*DB::enableQueryLog(); // Enable query log

$user = App\User::find(31);
//dd($user->hasRole('web-developer')); // will return true
//dd($user->hasRole('project-manager'));// will return false
//dd($user->givePermissionsTo('manage-users'));
dd($user->hasPermission('manage-users'));// will return true

dd(DB::getQueryLog()); // Show results of log*/
//dd(auth());
$developer = Role::where('slug','web-developer')->first();
$user = \App\User::find(32);


Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/plans', 'PlanController@index')->name('plans.index');
    Route::get('/plan/{plan}', 'PlanController@show')->name('plans.show');
    Route::post('/subscription', 'SubscriptionController@create')->name('subscription.create');


});

/*
\App\Permission::get()->map(function ($permission) use($user) {
    //print_r($permission);
      //  echo '<pre>' ; print_r($permission);
    echo ($user->hasPermissionTo($permission));
    //return $user->hasPermissionTo($permission);
});*/
//die;
//auth()->user()

$user = \App\User::find(32);
    //dd($user->can('create-tasks'));

Route::get('posts', ['middleware' => 'maintenance', function () {
    return "Only big boys/girls can see this.";
}]);


Route::group(['middleware' => ['role:web-developer','auth']], function() {
//    $user = \App\User::find(31);
  //dd($user->can('create-tasks'));
    Route::get('/dashboard', function() {
        //auth()->user()->givePermissionsTo('manage-users');
           dd(auth()->user()->id);

        //dd(Auth::user()->hasRole('project-manager'));
        return 'Welcome Project Manager';
    });

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
