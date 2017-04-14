<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUsername()
    {
        return Auth::user() ? Auth::user()->name : 'Guest';
    }
}
