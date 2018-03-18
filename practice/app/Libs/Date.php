<?php

namespace App\Libs;

class Date
{
    /**
     *
     * @return string
     */
    public function getNow()
    {
        return date('Y-m-d H:i:s');
    }
}