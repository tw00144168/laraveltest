<?php

namespace App\Http\Controllers;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\MenusRequest;
use App\Http\Service\MenusService;
use App\Menus;




class MenusController extends Controller
{

	public function index($orderid)
	{
		$menus_serv = new MenusService();
        $menus = $menus_serv->all($orderid);

		return view('menus')
                ->with('menus',$menus)
                ->with('orderid',$orderid);
	}


	public function create($orderid)
	{
		return view('menuscreate')
               ->with('title','新增菜單')
               ->with('orderid',$orderid);
	}

	public function insert(MenusRequest $request)
	{
        $request->validate([
            'menuname' => 'required',
            'orderid' => 'required'
        ]);

        $menuname = $request->menuname;
		$orderid = $request->orderid;
		$content = $request->description;

		$menus_serv = new MenusService();
		$menus = $menus_serv->insert($orderid,$menuname,$content);

		return Redirect('menus/'.$orderid);
	}


	public function edit($keyvalue)
	{
		$menus_serv = new MenusService();
		$menus = $menus_serv->getbykey($keyvalue);

		return view('menuscreate')
				->with('menus',$menus)
				->with('orderid',$menus->orderid)
				->with('title','修改菜單')
				->with('type','edit');

	}

	public function update(MenusRequest $request)
	{
        $request->validate([
        	'keyvalue' => 'required',
            'menuname' => 'required'
        ]);


        $keyvalue = $request->keyvalue;
        $menuname = $request->menuname;
        $content = $request->description;

		$menus_serv = new MenusService();
		$menus_serv->update($keyvalue,$menuname,$content);

		$orderid = $menus_serv->getbykey($keyvalue);

		return Redirect('menus/'.$orderid->orderid);

	}

	public function delete($keyvalue)
	{
		$menus_serv = new MenusService();
        $orderid = $menus_serv->getbykey($keyvalue);

		$menus_serv->delete($keyvalue);

		return Redirect('menus/'.$orderid->orderid);

	}


}
