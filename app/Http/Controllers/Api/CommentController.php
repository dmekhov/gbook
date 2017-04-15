<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $items = Comment::latest()->leftJoin("users", "users.id", "=", "comments.user_id")->select(['users.name as username', 'comments.*'])->paginate(5);
        return $items;
    }

    public function store(Request $request)
    {

        $this->validate($request, ['text'=>'required',]);

        if(Auth::user()) {
            $comment = Auth::user()->comments()->create($request->all())->toArray();
            $comment['username'] = Auth::user()->name;
        } else {
            $comment = Comment::create($request->all());
        }

        return $comment;
    }
}
