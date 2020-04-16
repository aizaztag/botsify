<?php
namespace App\Traits;

use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

Trait UserTrait{
     public function calculate_sum(){
         //DB::table('users')->update(['calculated_sum' => array_sum(array(2,4))]);
         DB::table('users')->update(['calculated_sum' => DB::raw("calculated_sum +" .array_sum(array(2,4)))]);
         echo 'user calculate-sum updated';
     }
}