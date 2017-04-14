<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $items = Comment::latest()->leftJoin("users", "users.id", "=", "comments.user_id")->get(['users.name as username', 'comments.*']);
        return $items;
    }
}
