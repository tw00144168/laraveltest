<?php

namespace App\Http\Repository;

use App\Menus;

class MenusRepository
{
    public function all($orderid)
    {
        $menus = new Menus;
        return $menus::where('orderid', $orderid)->get();
    }

    public function insert($orderid,$menuname,$content)
    {
		$menus = new Menus;
        $menus->orderid = $orderid;
        $menus->keyvalue = date('YmdHis');
		$menus->menuname = $menuname;
        $menus->content = $content;
		$result = $menus->save();
		return $result;
    }

    public function update($keyvalue,$menuname,$content)
    {
		$menus = $this->getbykey($keyvalue);

		$menus->menuname = isset($menuname) ? $menuname : $menus->menuname;
        $menus->content = isset($content) ? $content : $menus->content;
		$result = $menus->save();

		return $result;
    }

    public function delete($keyvalue)
    {
    	$menus = $this->getbykey($keyvalue);
		return $menus->delete();
    }

    public function getbykey($keyvalue)
    {
		$menus = new Menus;
		return $menus::where('keyvalue', $keyvalue)->first();
    }

}
