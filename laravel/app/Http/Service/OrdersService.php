<?php


namespace App\Http\Service;

use App\Http\Repository\OrdersRepository;
use App\Others\Status;
use App\Tools\Format;

class OrdersService
{

    public function all()
    {
    	$orders_rep = new OrdersRepository();
    	return $orders_rep->all();
    }


    public function insert($ordername)
    {
        $orders_rep = new OrdersRepository();
        $order = $orders_rep->getbyName($ordername);
        if($order !== null){
            return 0;
        }

    	return $orders_rep->insert($ordername);
    }

    public function update($orderid,$ordername)
    {
        $orders_rep = new OrdersRepository();

        $order = $orders_rep->getbyName($ordername);
        if($order !== null){
            return 0;
        }
        
    	return $orders_rep->update($orderid,$ordername);
    }

    public function delete($orderid)
    {
    	echo $orderid;
        $orders_rep = new OrdersRepository();
    	return $orders_rep->delete($orderid);
    }

    public function getbyId($orderid)
    {
        $orders_rep = new OrdersRepository();
    	return $orders_rep->getbyId($orderid);
    }


}
