<?php

namespace App\Http\Repository;

use App\Orders;
use App\Menus;

class OrdersRepository
{
    public function all()
    {
    	return Orders::all();
    }

    public function insert($ordername)
    {
		$order = new Orders;
		$order->ordername = $ordername;
		$result = $order->save();
		return $result;
    }

    public function update($orderid,$ordername)
    {
		$orders = $this->getbyId($orderid);

		$orders->ordername = isset($ordername) ? $ordername : $orders->ordername;
		$result = $orders->save();

		return $result;
    }

    public function delete($orderid)
    {
   	    $orders = $this->getbyId($orderid);
    	$orders->delete();

        Menus::where('orderid','=',$orderid)->delete();

    }

    public function getbyId($orderid)
    {
		return Orders::where('id','=',$orderid)->first();
    }

    public function getbyName($ordername)
    {
        return Orders::where('ordername','=',$ordername)->first();
    }

}
