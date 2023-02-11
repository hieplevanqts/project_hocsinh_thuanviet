<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Dashboard\Entities\Order;
use DB;

class OrderController extends Controller
{
    public function list()
    {
        $orders = Order::all();
        return view('dashboard::order.list', compact('orders'));
    }

    public function cartByOrder(Request $request)
    {
        try {
            $order_id = $request->order_id;
            $carts = DB::table("carts")->where("order_id", $order_id)->get();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$carts]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function statusUpdate(Request $request)
    {
        
        try {
            $item = Order::findOrFail($request->id);
            if($item->status == 0)
            {
                $item->status = 1;
            }else{
                $item->status = 0;
            }
            $item->save();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$item]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }
}
