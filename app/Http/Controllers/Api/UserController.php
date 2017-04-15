<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUsername()
    {
        return Auth::user() ? Auth::user()->name : 'Guest';
    }

	public function show(User $user)
	{
		if(!$user->id) $user = Auth::user();
		$items = $user->comments()->latest()->leftJoin("users", "users.id", "=", "comments.user_id")->get(['users.name as username', 'comments.*']);

		return $items;
	}
}
