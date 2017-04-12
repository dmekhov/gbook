@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Guest Messages</h1>

                @foreach($items as $item)
                    <div class="gbook-message panel panel-default">
                        <div class="panel-heading">{{$item->user ? $item->user->name : 'Guest'}}</div>
                        <div class="panel-body"><div class="gbook-message__text">{{$item->text}}</div></div>
                    </div>
                @endforeach

                {!! $items->render() !!}

                @include('errors._list')

                <div class="panel panel-default" id="message-form">
                    <div class="panel-heading">{{Auth::guest() ? 'Guest' : Auth::user()->name}}</div>
                    <form class="panel-body" method="POST" action="{{ url('/comment') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="text">Message</label>
                            <textarea class="form-control" name="text" id="text" rows="3" required>{{ old('text') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
