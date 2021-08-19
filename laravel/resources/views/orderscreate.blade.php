<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }}</title>
        <style type="text/css">
        .fail {margin:20px auto; color: red; }
        </style>
    </head>
    <body>
        <div style="padding-top: 20px;" class="container">
        <div class="row">
        <div class="col-md-12">
        <h1>{{ $title }}</h1>
            @if ($errors->has('fail'))
                <div class="fail">{{ $errors->first('fail') }}</div>
            @endif

        @if (isset($type))

            {{ Form::open(['url'=>'orders/update', 'method'=>'post']) }}
                {{ Form::label('ordername', '指令id : '.$orders->id) }}
                {{ Form::hidden('id', $orders->id) }}
                {{ Form::text('ordername',$orders->ordername)}}
                {{ Form::submit('儲存') }}
            {{ Form::close() }}

        @else

            {{ Form::open(['url'=>'orders/insert', 'method'=>'post']) }}
                例:/orders<br/><br/>
                {{ Form::label('ordername', '指令') }}
                {{ Form::text('ordername','/')}}
                {{ Form::submit('儲存') }}
            {{ Form::close() }}
            <br/><br/>
            <div><a href="{{ url('orders/') }}">回上一頁</a></div>
        @endif
        </div>
        </div>
        </div>
    </body>
</html>
