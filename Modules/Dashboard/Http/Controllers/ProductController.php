<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Dashboard\Entities\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->GalleryController = new \Modules\Gallery\Http\Controllers\GalleryController;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $list = Product::paginate(20);
        // dd(Auth::user()->roles);
        return view('dashboard::product.list', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dashboard::product.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
    //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dashboard::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dashboard::product.create', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
    //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
    //
    }


    public function postProductCreate(Request $request)
    {

        try {
            if($request->edit)
            {
                $product = Product::findOrFail($request->edit);
            }else{
                $product = new Product();
            }
            $product->name = $request->name;
            $product->slug = Str::of($request->name)->slug('-');
            if ($request->hasFile('image')) {
                $file = $request->image;
                $file->move('upload/product/avatar/', $file->getClientOriginalName());
                $product->image = 'upload/product/avatar/' . $file->getClientOriginalName();
            }else {
                if($request->edit){
                    $product->image = $request->old_image;
                }else{
                    $product->image = 'images/no-image.jpg';
                }
            }
          
            $product->code = $request->code;
            $product->description = $request->description;
            $product->content = $request->detail;
            $product->description_seo = $request->description_seo;
            $product->title_seo = $request->title_seo;
            $product->keyword_seo = $request->keyword_seo;
            $product->keyword_seo = $request->keyword_seo;
            $product->status = $request->status ? 1 : 0;
            $product->home = $request->home ? 1 : 0;
            $product->hot = $request->hot ? 1 : 0;
            $product->focus = $request->focus ? 1 : 0;
            $product->price = $request->price;
            $product->price_sale = $request->price_sale;
            $product->brand_id = 1;
            // return $request->edit;
            if(!$request->edit)
            {
                $product->store_id = 51;
            }
            $product->store_id = 51;
            $product->save();
            $arrCategory = explode(",", $request->category);
            for ($i = 0; $i <= count($arrCategory) - 1; $i++) {
                $productCategory = new ProductCategory();
                $productCategory->product_id = $product->id;
                $productCategory->category_id = $arrCategory[$i];
                $productCategory->save();
            }

            $path = 'upload/tmp/';
            $path_after = 'upload/files/product_images/' . $product->id;
            if (!file_exists($path_after)) {
                $mask = umask(0);
                mkdir($path_after, 0777);
                umask($mask);
            }

            for ($i = 0; $i <= $request->countImg - 1; $i++) {
                $str = 'arrImg' . $i;
                $tmp = json_decode($request->$str);
                $fileNameExtra = $this->GalleryController->randomFileName($tmp->image);
                $item = new ProductImage();
                
                $item->url = $path_after .'/'. $fileNameExtra;
                $item->product_id = $product->id;
                
                if ($item->save()) {
                    copy($path . $tmp->image, $path_after . '/' . $fileNameExtra);
                    unlink($path . $tmp->image);
                }
            }
            
            $request->session()->flash('success', 'Thành công');
            return response()->json(['status'=>200, 'message'=>'Thành công', 'result'=>$product]);
        }
        catch (\Throwable $th) {
            return response()->json(['status'=>201, 'message'=>'Thất bại', 'result'=>$th]);
        }


    }

    public function listImageById(Request $request, $product_id)
    {
        try {
            $productImage = ProductImage::where("product_id", $product_id)->get();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$productImage]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }

    }

    public function getItemEdit(Request $request, $id)
    {
        try {
            $item = Product::findOrFail($id);
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$item]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function updateStatus(Request $request)
    {
        // return $request->all();
        try {
            $item = Product::findOrFail($request->product_id);
            if($item->status == 1)
            {
                $item->status = 0;
            }else{
                $item->status = 1;
            }
            $item->save();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$item]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function deleteItem(Request $request)
    {
        try {
            $item = Product::findOrFail($request->product_id);
            $productImage = ProductImage::where('product_id', $item->id)->get();
            $productCategory = ProductCategory::where('product_id', $item->id)->get();
            foreach ($productImage as $key => $value) {
                if(file_exists($value->url))
                {
                    unlink($value->url);
                    $value->delete();
                }
            }

            foreach ($productCategory as $k => $v) {
                $v->delete();
            }
            if(file_exists($item->image))
            {
                unlink($item->image);
            }
            $item->delete();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>'']);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function deleteImage(Request $request)
    {
        try {
            $productImage = ProductImage::where('product_id', $request->id)->first();
            if($productImage)
            {
                if(file_exists($productImage->url))
                {
                    unlink($productImage->url);
                }
                $productImage->delete();
                return response()->json(["status"=>200, "message"=>"Thành công", "result"=>""]);
            }else{
                return response()->json(["status"=>200, "message"=>"Thành công", "result"=>"Hình ảnh không tồn tại"]);
            }
            
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }
}
