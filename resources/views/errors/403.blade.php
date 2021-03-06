@extends('layouts.app')

@section('content')
    <div class="container full-height">
        <div class="flex-center">
                <div class="code">403</div>
                <div class="title">Forrbiden <br/>You can not be here.</div>
        </div>
    </div>
@endsection

@section('head')

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: calc(100vh - 73px);
        }

        .flex-center {
            align-items: baseline;
            display: flex;
            justify-content: space-around;
        }

        .code {
            font-size: 120px;
            align-self: center;
        }

        .title {
            font-size: 84px;
            font-weight: 100;
        }
    </style>
@endsection
