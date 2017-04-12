@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>{{$user->name}} Messages</h1>

                @foreach($items as $item)
                    <div class="gbook-message panel panel-default">
                        <div class="panel-heading">{{$item->user ? $item->user->name : 'Guest'}}</div>
                        <div class="panel-body"><div class="gbook-message__text">{{$item->text}}</div></div>
                    </div>
                @endforeach

                <div class="paginate-block">
                    <div class="pages">{!! $items->render() !!}</div>
                    @if($items->lastPage() > 1)
                    <div class="pagination per-page-toggle">
                        <a href="{{ url('/per-page-toggle') }}" class="btn btn-default"
                           onclick="event.preventDefault();
                                                     document.getElementById('per-page-toggle').submit();">
                            @if($items_per_page = App\UserParams::getInstance()->getItemsPerPage() == 5){{10}}@else{{5}}@endif per page
                        </a>

                        <form id="per-page-toggle" action="{{ url('per-page-toggle') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
