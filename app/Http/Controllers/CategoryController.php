<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Log;
use Illuminate\Support\Str;
use Modules\Dashboard\Entities\Product;
use App\Models\ProductCategory;

class CategoryController extends Controller
{
   

    public function index()
    {
        
        // return Category::fixTree();
        $categories = Category::withDepth()->having('depth', '=', 0)->where("id", ">", 3)->defaultOrder()->get()->toFlatTree(); //
       
        // dd($categories);
        return view('categories.index', compact('categories'));
    }

    public function move(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $node = Category::find($id);
        if($type == 'up')
        {
            $node->up();
        }else{
            $node->down();
        }

        return redirect()->back();
    }

    public function updateTree(Request $request)
    {
        $data = $request->data;

        $root = Category::find(3);
        Category::rebuildTree($data, true);
        // foreach ($data as $key => $value) {
           
        //     if(isset($value['children']))
        //     {
        //         $value['children'];
        //         foreach ($value['children'] as $k => $v) {
        //             $c = Category::find($v['id']);
        //             $c['parent_id'] = $value['id'];
        //             $c->save();
        //         }
        //     }
        // }
        return response()->json($data);
    }

    public function dataTable(Request $request)
    {
        $data = [];
        $draw = $request->draw ? $request->draw : 10;
        $row =  $_POST['start'] ? $_POST['start'] : 0;
        $rowperpage = $_POST['length']; // Rows display per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        // $searchValue = mysqli_real_escape_string($con,$_POST['search']['value']); 
        $str = $_POST['search']['value'];
        if( $str){
            if($columnName && $columnSortOrder){
                $all = Category::limit($rowperpage)
                                ->offset($row)
                                ->where('name', 'like', "%$str%")
                                ->orderBy($columnName, $columnSortOrder)
                                ->get();
                $totalRecords = count(Category::where('name', 'like', "%$str%")
                ->orderBy($columnName, $columnSortOrder)
                ->get());
                $totalRecordwithFilter = count(Category::where('name', 'like', "%$str%")
                ->orderBy($columnName, $columnSortOrder)
                ->get());
            }else{
                $all = Category::limit($rowperpage)->offset($row)->where('name', 'like', "%$str%")->get();
                $totalRecords = count(Category::where('name', 'like', "%$str%")->get());
                $totalRecordwithFilter = count(Category::where('name', 'like', "%$str%")->get());
            }
        }else{
            if($columnName && $columnSortOrder){
                $all = Category::orderBy($columnName, $columnSortOrder)
                ->limit($rowperpage)
                ->offset($row)->get();
                $totalRecords = count(Category::orderBy($columnName, $columnSortOrder)->get());
                $totalRecordwithFilter = count(Category::orderBy($columnName, $columnSortOrder)->get());
            }else{
                $all = Category::limit($rowperpage)
                ->offset($row)->get();
                $totalRecords = count(Category::all());
                $totalRecordwithFilter = count(Category::all());
            }
            
        }
        foreach ($all as $key => $value) {
            $data[$key] = [
                'id' => $value->id,
                'name' => $value->name,
                'order' => ''
            ];
        }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
        return response()->json($response);
    }

    public function list()
    {
        return view("dashboard::category.list");
    }

    public function create()
    {
        return view("dashboard::category.create");
    }

    public function postCreate(Request $request)
    {
        // return $request->all();
        $item = Category::where('name', $request->name)->first();
        $edit = $request->edit;
        try {
            if($edit)
            {
                $category = Category::findOrFail($edit);
            }else{
                if($item)
                {
                    return response()->json(['status'=>201, 'message'=>'Đã tồn tại, vui lòng chọn tên khác', 'result'=>$item]);
                }
                $category = new Category();
            }
            
            $category->name = $request->name;
            $category->slug = Str::of($request->name)->slug('-');
            $category->parent_id = $request->parent_id != 'undefined' ? $request->parent_id : null ;
            $category->status = $request->status;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $file->move('upload/category/', $file->getClientOriginalName());
                $category->image = 'upload/category/'.$file->getClientOriginalName();
            }else{
                $category->image = $request->old_image;
            }
            $category->save();
            return response()->json(['status'=>200, 'message'=>'Thành công', 'result'=>$category]);

        } catch (\Throwable $th) {
            return response()->json(['status'=>201, 'message'=>'Thất bại', 'result'=>$th]);
        }
    }

    public function getCategory()
    {
        try {
            $list = Category::all();
            return response()->json(['status'=>200, 'message'=>'Thành công', 'result'=>$list]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>201, 'message'=>'Thất bại', 'result'=>$th]);
        }
    }

    public function getListCategory(Request $request)
    {
        try {
            $list = Category::whereNull("parent_id")->get();
           
            return response()->json(['status'=>200, 'message'=>'Thành công', 'result'=>$list]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>201, 'message'=>'Thất bại', 'result'=>$th]);
        }
    }

    public function viewCategory($id, $slug)
    {
        return view('canans.category.index', compact('id', 'slug'));
    }

    public function listProduct($id)
    {
        try {
            $arrProductId = ProductCategory::where('category_id', $id)->pluck('product_id')->toArray();
            $products = Product::whereIn('id', $arrProductId)->get();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$products]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function edit($id)
    {
        return view('dashboard::category.create', compact('id'));
    }

    public function detail($id)
    {
        try {
            $item = Category::findOrFail($id);
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$item]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function updateStatus($id)
    {
        try {
            $item = Category::findOrFail($id);
            if($item->status == 'true')
            {
                $item->status = 'false';
            }else{
                $item->status = 'true';
            }
            $item->save();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$item]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function delete($id)
    {
        try {
            $item = Category::findOrFail($id);
            if($item)
            {
                if(file_exists(@$item->image))
                {
                    unlink(@$item->image);
                }
            }
            $item->delete();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$item]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }
   
}
