<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\OrdersRequest;
use App\Http\Service\OrdersService;
use App\Orders;

class OrdersController extends Controller
{

	public function index()
	{
		$orders_serv = new OrdersService();
        $orders = $orders_serv->all();

		return view('orders')
                ->with('orders',$orders);
	}


	public function create()
	{
		return view('orderscreate')
                ->with('title','新增指令');
	}

	public function insert(OrdersRequest $request)
	{
        $v = $request->validate([
            'ordername' => 'required|regex:/^\/.*(?=.*[a-z]).*$/'
        ]);


        $ordername = $request->ordername;

		$orders_serv = new OrdersService();
		$orders = $orders_serv->insert($ordername);

		if ($orders == 0) {
	    	return view('orderscreate')
	    			->with('title','新增指令')
			        ->withErrors(['fail'=>'指令已存在']);
		} else {
			return Redirect('orders');
		}
	}


	public function edit(OrdersRequest $request)
	{
        $orderid = $request->id;

		$orders_serv = new OrdersService();
		$orders = $orders_serv->getbyId($orderid);

		return view('orderscreate')
				->with('orders',$orders)
				->with('title','修改指令')
				->with('type','edit');

	}

	public function update(OrdersRequest $request)
	{
        $request->validate([
        	'id' => 'required',
            'ordername' => 'required|regex:/^\/.*(?=.*[a-z]).*$/'
        ]);

        $orderid = $request->id;
        $ordername = $request->ordername;

		$orders_serv = new OrdersService();
		$orders = $orders_serv->update($orderid,$ordername);

		if ($orders == 0) {
	    	return view('orderscreate')
	    			->with('title','新增指令')
			        ->withErrors(['fail'=>'指令已存在']);
		} else {
			return Redirect('orders');
		}

	}

	public function delete(OrdersRequest $request)
	{
        $orderid = $request->id;

		$orders_serv = new OrdersService();
		$orders_serv->delete($orderid);

		return Redirect('orders');
	}


}
