<?php

namespace App;

class UserParams
{
    protected static $instance;

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    protected function __construct()
    {

    }

    public function getItemsPerPage()
    {
        if(!empty(session('per_page'))) {
            return session('per_page');
        } else {
            return 5;
        }
    }
}