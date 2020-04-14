<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;

Trait UserTrait{
     public function calculate_sum(){
         DB::table('users')->update(['calculated_sum' => array_sum(array(2,4))]);
     }
}