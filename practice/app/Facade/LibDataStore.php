<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class LibDataStore extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'libDataStore';
    }
}