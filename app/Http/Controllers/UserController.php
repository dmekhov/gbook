<?php

namespace App\Http\Controllers;

use App\User;
use App\UserParams;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user)
    {
        $items_per_page = UserParams::getInstance()->getItemsPerPage();
        $items = $user->comments()->latest()->paginate($items_per_page);

        return view('user.show', compact('user', 'items'));
    }

    public function personal()
    {
        $items_per_page = UserParams::getInstance()->getItemsPerPage();
        $user = Auth::user();
        $items = $user->comments()->latest()->paginate($items_per_page);

        return view('user.show', compact('user', 'items'));
    }
}
