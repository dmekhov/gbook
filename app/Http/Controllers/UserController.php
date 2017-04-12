<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function personal()
    {
        if(Auth::guest()) return abort(403, 'Unauthorized action.');
        $user = Auth::user();
        return view('user.show', compact('user'));
    }
}
