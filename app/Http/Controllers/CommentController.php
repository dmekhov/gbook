<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\UserParams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    public function index()
    {
        $items_per_page = UserParams::getInstance()->getItemsPerPage();
        $items = Comment::latest()->paginate($items_per_page);
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


    public function perPage()
    {
        if(session('per_page') == 10) {
            session(['per_page' => 5 ]);
        } else {
            session(['per_page' => 10 ]);
        }

        return redirect()->back();
    }
}
