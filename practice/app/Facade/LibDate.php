<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class LibDate extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'libDate';
    }
}