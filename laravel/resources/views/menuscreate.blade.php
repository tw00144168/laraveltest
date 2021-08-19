<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }}</title>

    </head>
    <body>
        <div style="padding-top: 20px;" class="container">
        <div class="row">
        <div class="col-md-12">   
        <h1>{{ $title }}</h1>
        @if (isset($type))

            {{ Form::open(['url'=>'menus/update', 'method'=>'post']) }}
                {{ Form::label('menuname', '菜單名稱 : ') }}
                {{ Form::hidden('keyvalue', $menus->keyvalue) }}
                {{ Form::text('menuname',$menus->menuname)}}
                <br/>
                {{ Form::label('description','內容:')}}
                <br/>
                {{ Form::textarea('description', $menus->content)  }}
                {{ Form::submit('儲存') }}
            {{ Form::close() }}

        @else

            {{ Form::open(['url'=>'menus/insert', 'method'=>'post']) }}
                {{ Form::label('menuname', '菜單名稱') }}
                {{ Form::hidden('orderid', $orderid) }}
                {{ Form::text('menuname')}}
                <br/>
                {{ Form::label('description','內容:')}}
                <br/>
                {{ Form::textarea('description')  }}
                {{ Form::submit('儲存') }}
            {{ Form::close() }}

        @endif
        <br/>       
        <div><a href="{{ url('menus/'.$orderid) }}">回上一頁</a></div>

        </div>
        </div>
        </div>
    </body>
</html>
