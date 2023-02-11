<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Dashboard\Entities\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\News;
// use Gloudemans\Shoppingcart\Cart;
// use Gloudemans\Shoppingcart\CartItem;
// use Cart;
// use Darryldecode\Cart\Cart;
// use Darryldecode\Cart\Cart;
// use Session;
use Cart;
use App\Models\Cart as CartModel;
use App\Models\Order;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    public function index(){
        return view('canans.product.index');
    }
    public function detail($id, $slug)
    {
        $product = Product::findOrFail($id);
        $images = ProductImage::where("product_id", $id)->get();
        $arrCategory = ProductCategory::where("product_id", $id)->distinct()->pluck("category_id");
        $arrProduct = ProductCategory::whereIn("category_id", $arrCategory)->where("product_id", "!=", $id)->distinct()->pluck("product_id");
        $same = Product::whereIn("id", $arrProduct)->get();
        $news = News::limit(10)->offset(0)->get();
       return view('canans.product.detail', compact('id', 'product', 'images', 'same', 'news'));
    }

    public function getDetailProduct(Request $request, $id)
    {
        try {
            $data['product'] = Product::findOrFail($id);
            $data['images'] = ProductImage::where("product_id", $id)->get();
            $arrCategory = ProductCategory::where("product_id", $id)->distinct()->pluck("category_id");
            $arrProduct = ProductCategory::whereIn("category_id", $arrCategory)->where("product_id", "!=", $id)->distinct()->pluck("product_id");
            $data['same'] = Product::whereIn("id", $arrProduct)->get();
            $data['news'] = News::limit(10)->offset(0)->get();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$data]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function addCart(Request $request)
    {
        try {
            $product = Product::findOrFail($request->id);

                $count = (int)$request->count;


                $data = array(
                    'id'=>$product->id,
                    'name'=>$product->name,
                    'qty'=>$count,
                    'price'=>$product->price,
                    'weight' => 550,
                    'options'=>array(
                        'image'=>$product->image
                    )
                );

        Cart::add($data);
        $count = Cart::count();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$data, "count"=>$count]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }

    }
    public function listCart()
    {
        return view('canans.cart.list');
    }

    public function listCartAjax(Request $request)
    {
        try {
            $list = Cart::content();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$list]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function updateQtyItem(Request $request)
    {
        try {
            $rowId = $request->rowId;
            $qty = $request->qty;
            Cart::update($rowId, ['qty'  => $qty]);
            $count = Cart::count();
            $subtotal = Cart::get($rowId)->subtotal();
            $priceTotal = Cart::priceTotal();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>'', 'count'=>$count, 'subtotal'=>$subtotal, "priceTotal"=>$priceTotal]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function deleteItemCart(Request $request)
    {
        try {
            $rowId = $request->rowId;
            Cart::remove($rowId);
            $count = Cart::count();
            $priceTotal = Cart::priceTotal();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>'', 'count'=>$count, "priceTotal"=>$priceTotal]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function orderCart(Request $request)
    {
        // return $request->all();


        try {
            $order = new Order($request->all());
            $order->save();
            $carts = Cart::content();
            foreach ($carts as $key => $value) {
                $item = new CartModel();
                $item->product_id = $value->id;
                $item->name = $value->name;
                $item->price = $value->price;
                $item->image = $value->options->image;
                $item->qty = $value->qty;
                $item->order_id = $order->id;
                $item->subtotal = $value->subtotal;
                $item->save();
            }
            Cart::destroy();
                return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$order]);

        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

}
