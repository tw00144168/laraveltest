<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>菜單</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div style="padding-top: 50px;" class="container">
        <div class="row">
        <div class="col-md-12">
        <h1>菜單</h1>
        </div>
        <div><a href="{{ url('menus/'.$orderid.'/menuscreate') }}">新增</a></div>
        <div><a href="{{ url('orders/') }}">回上一頁</a></div>
        </div>
        @if (isset($menus))
        <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <td style="border: 1px solid black;">菜單名稱</td>
                <td style="border: 1px solid black;">內容</td>
                <td style="border: 1px solid black;">操作</td>
            </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                <tr>
                    <td style="border: 1px solid black;">
                        {!! $menu->menuname !!}
                    </td>
                    <td style="border: 1px solid black;">
                        <div style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; width: 100px;">{!! $menu->content !!}</div>
                    </td>
                    <td style="border: 1px solid black;">
                        <a href="{{ url('menus/'.$menu->keyvalue.'/edit') }}">編輯</a>
                        <a href="{{ url('menus/'.$menu->keyvalue.'/delete') }}">刪除</a>
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
