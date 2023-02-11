<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Dashboard\Entities\Product;
use App\Models\Category;
use App\Models\News;
// use Darryldecode\Cart\Cart;
use Cart;

class HomeController extends Controller
{
    public function index()
    {
        // echo 1;die;
        return view('canans.home.index');
    }

    public function bestSeller()
    {
        $products = Product::where(['status'=>1, 'hot'=>1])->orderBy("id", "desc")->limit(10)->offset(0)->get();
        return response()->json(['status'=>200, 'message'=>'Thành công', 'result'=>$products]);
    }

    public function getListCategoryHome()
    {
        try {
            $category = Category::where("status", 'true')->orderBy("id", "asc")->limit(20)->offset(0)->get();
            return response()->json(['status'=>200, 'message'=>'Thành công', 'result'=>$category]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>201, 'message'=>'Thất bại', 'result'=>$th]);
        }
    }

    public function getNewsHome()
    {
        try {
            $news = News::paginate(3);
            return response()->json(['status'=>200, 'message'=>'Thành công', 'result'=>$news]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>201, 'message'=>'Thất bại', 'result'=>$th]);
        }
    }

    public function QRcode()
    {
        return view('welcome');
    }

    public function testCart()
    {
      
        // return $data;
        Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        return 'Thành công';
    }

    public function getCart()
    {
        $listCart = Cart::content();
        return $listCart;
    }

    public function delCart()
    {
        Cart::destroy();
        return "removed all";
    }

    public function testVue()
    {
        return view('test_vue.app');
    }
}
