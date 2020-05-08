<?php
namespace  App\Larashout;



use Illuminate\Support\Facades\Facade;


class LarashoutFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'larashout';
    }
}