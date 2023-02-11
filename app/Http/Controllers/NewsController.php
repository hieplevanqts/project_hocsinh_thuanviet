<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Auth;

class NewsController extends Controller
{
    public function list()
    {
        return view('dashboard::news.index');
    }

    public function listNews()
    {
        
        try {
            $news = News::orderBy('id', 'desc')->paginate(10);
            return response()->json(['status'=>200, 'message'=>'Thành công', 'result'=>$news]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>201, 'message'=>'Thất bại', 'result'=>$th]);
        }
    }

    public function createNews()
    {
        return view('dashboard::news.create');
    }

    public function addNews(Request $request)
    {
        
        try {
            if($request->edit)
            {
                $news = News::findOrFail($request->edit);
            }else{
                $news = new News();
            }
            
            $news->name = $request->name;
            $news->description = $request->description;
            $news->content = $request->content;
            $news->slug = Str::of($request->name)->slug('-'); 
            $news->creator_id = Auth::user() ? Auth::user()->id : 1;
            if($request->hasFile('image'))
            {
                $file = $request->image;
                $file->move('upload/news/avatar', $file->getClientOriginalName());
                $news->image = 'upload/news/avatar/' . $file->getClientOriginalName();
            }else{
                if($request->edit)
                {
                    $news->image = $request->old_image;
                }
            }
            $news->save();
            return response()->json(['status'=>200, 'message'=>'Thành công', 'result'=>$news]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>201, 'message'=>'Thất bại', 'result'=>$th]);
        }
    }

    public function deleteNews(Request $request)
    {
        try {
            $news = News::findOrFail($request->id);
            if(file_exists($news->image))
            {
                unlink($news->image);
            }
            $news->delete();
            return response()->json(['status'=>200, 'message'=>'Thành công', 'result'=>'']);
        } catch (\Throwable $th) {
            return response()->json(['status'=>201, 'message'=>'Thất bại', 'result'=>$th]);
        }
    }

    public function updateNews(Request $request)
    {
        try {
            $news = News::findOrFail($request->id);
            return response()->json(['status'=>200, 'message'=>'Thành công', 'result'=>$news]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>201, 'message'=>'Thất bại', 'result'=>$th]);
        }
    }

    public function editNews($id)
    {
        return view('dashboard::news.create', compact('id'));
    }

    public function detail($id, $detail)
    {
        $news = News::findOrFail($id);
        return view('canans.news.detail', compact('news'));
    }

    public function listNewsFontend()
    {
        $news = News::orderBy('id', 'desc')->paginate(10);
        return view('canans.news.list', compact('news'));
    }
}
