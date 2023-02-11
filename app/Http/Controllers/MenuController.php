<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Dashboard\Entities\Menu;

class MenuController extends Controller
{
    public function list()
    {
        try {
            $menus = Menu::whereNull('parent_id')->get();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$menus]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }
}
