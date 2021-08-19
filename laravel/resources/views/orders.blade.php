<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>指令</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <div style="padding-top: 50px;" class="container">
        <div class="row">
        <div class="col-md-12">
        <h1>指令</h1>
        </div>
        <div style=" margin-bottom: 10px;"><a href="{{ url('orders/orderscreate') }}" class="col-md-12">新增</a></div>
        @if (isset($orders))
        <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <td style="border: 1px solid black;"><div class="col-md-4">指令名稱</div></td>
                <td style="border: 1px solid black; "><div class="col-md-4">操作</div></td>
            </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)    
                <tr>
                    <td style="border: 1px solid black;">
                        <a href="{{ url('menus/'.$order->id) }}">{!! $order->ordername !!}</a>
                    </td>
                    <td style="border: 1px solid black;">
                        <a href="{{ url('orders/'.$order->id.'/edit') }}">編輯</a>
                        <a href="{{ url('orders/'.$order->id.'/delete') }}">刪除</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        @endif
        </div>
        </div>
    </body>
</html>
