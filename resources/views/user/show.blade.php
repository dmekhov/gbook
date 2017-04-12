@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>{{$user->name}} Messages</h1>

                @foreach($user->comments as $item)
                    <div class="gbook-message panel panel-default">
                        <div class="panel-heading">{{$item->user ? $item->user->name : 'Guest'}}</div>
                        <div class="panel-body"><div class="gbook-message__text">{{$item->text}}</div></div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
