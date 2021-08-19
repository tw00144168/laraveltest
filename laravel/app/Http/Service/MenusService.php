<?php


namespace App\Http\Service;

use App\Http\Repository\MenusRepository;
use App\Others\Status;
use App\Tools\Format;

class MenusService
{

    public function all($orderid)
    {
    	$menus_rep = new MenusRepository();
    	return $menus_rep->all($orderid);
    }


    public function insert($orderid,$menuname,$content)
    {
        $menus_rep = new MenusRepository();
    	return $menus_rep->insert($orderid,$menuname,$content);
    }

    public function update($keyvalue,$menuname,$content)
    {
        $menus_rep = new MenusRepository();
    	return $menus_rep->update($keyvalue,$menuname,$content);
    }

    public function delete($keyvalue)
    {
        $menus_rep = new MenusRepository();
    	return $menus_rep->delete($keyvalue);
    }

    public function getbykey($keyvalue)
    {
        $menus_rep = new MenusRepository();
    	return $menus_rep->getbykey($keyvalue);
    }

}
