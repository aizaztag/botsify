<?php

namespace App\Http\Controllers;

use App\Traits\UserTrait;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use UserTrait;

    public function __construct()
    {
        $this->calculate_sum();
    }
}
