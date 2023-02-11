<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Dashboard\Entities\Menu;
use Illuminate\Support\Str;
use App\Http\Traits\Menu as MenuTrait;

class MenuController extends Controller
{
    use MenuTrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('dashboard::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dashboard::menu.create');
    }

    public function postCreateMenu(Request $request)
    {
        // return $request->all();
        try {
            if($request->edit)
            {
                $menu = Menu::findOrFail($request->edit);
                $menu->parent_id = $request->parent_id;
                $menu->name = $request->name;
                $menu->type = $request->type;
                $menu->url = $request->url;
                $menu->position = $request->position;
            }else{
                $menu = new Menu($request->all());
            }
            $menu->slug = Str::of($menu->name)->slug('-');
            if($request->parent_id == ''){
                $menu->save();
            }else{
                $parent = Menu::findOrFail($request->parent_id);
                $menu->appendToNode($parent)->save();
            }
            
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$menu]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
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
        try {
            $item = Menu::findOrFail($id);
            $list = Menu::withDepth()->having('depth', '=', 0)->defaultOrder()->get()->toFlatTree(); 
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>["item"=>$item, "list"=>$list]]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dashboard::menu.create', compact('id'));
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

    public function list()
    {
        // return Menu::fixTree();
        $menus = Menu::withDepth()->having('depth', '=', 0)->defaultOrder()->get()->toFlatTree(); 
        return view('dashboard::menu.list', compact('menus'));
    }

    public function all()
    {
        // return Category::fixTree();
        try {
            $menus = Menu::withDepth()->having('depth', '=', 0)->defaultOrder()->get()->toFlatTree(); 
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$menus]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function deleteMenu(Request $request)
    {
        try {
            $item = Menu::findOrFail($request->id);
            $item->delete();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>""]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function sortMenu(Request $request)
    {
        $data = $request->data;
        $root = Menu::findOrFail(1);
        
        // return Menu::sortMenu($data);
       try {
            Menu::rebuildTree($data, true);
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>""]);
       } catch (\Throwable $th) {
           return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>""]);
       }
    }
}
