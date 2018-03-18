<?php

namespace App\Libs;

class DataStore
{
    private $data;

    public function __construct()
    {
        $this->data = array();

    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function addData($data)
    {
        array_push($this->data, $data);
    }
}