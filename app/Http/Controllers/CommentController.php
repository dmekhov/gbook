<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    public function index()
    {
        $items = Comment::latest()->paginate(5);
        return view('comment.index', compact('items'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), ['text'=>'required',]);

        if ($validator->fails()) {
            return redirect(url()->previous() . '#message-form')->withErrors($validator)->withInput();
        }

        if(Auth::user()) {
            Auth::user()->comments()->create($request->all());
        } else {
            Comment::create($request->all());
        }

        return redirect('/');
    }
}
