<?php

namespace App\Http\Traits;

// use App\Models\CarMedia;
// use App\Models\Media;
use Modules\Gallery\Entities\Gallery;
// use App\Models\Owner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait Menu
{
    public function uploadImage($image, $save_to = "images")
    {
        $sha1_file = sha1_file($image);
        if ($media = Gallery::where('sha1_text', $sha1_file)->first()) {
            $media->total++;
            $media->save();
        } else {
            $media = Gallery::create([
                'sha1_text' => $sha1_file,
                'total' => 1,
                'alt' => $image->getClientOriginalName(),
                'url' => url('storage/' . Storage::disk('public')->put($save_to, $image)),
            ]);
        }
        // if (Auth::check()) {
        //     Owner::create([
        //         'media_id' => $media->id,
        //         'user_id' => Auth::id(),
        //     ]);
        // }
        return $media;
    }

    public function removeImage($image_url, $car_id = null, $type = null)
    {
        $media = Gallery::where('url', $image_url)
            // ->whereHas('users', function ($query) {
            //     // if (!Auth::user()->roles[0]->name == 'admin') {
            //     //     $query->where('id', Auth::id());
            //     // }
            // })
            ->first();
        if ($media) {
            if ($media->total == 1) {
                $image_url = Str::after($image_url, 'storage/');
                Storage::disk('public')->delete($image_url);
                $media->delete();
            }
            $media->update(['total' => DB::raw('total-1')]);
            // $owner = Owner::where('media_id', $media->id)
            //     ->where('user_id', Auth::id())
            //     ->first();
            // if ($owner) {
            //     $owner->delete();
            // }
            // if ($car_id && $type) {
            //     $car_media = CarMedia::where('media_id', $media->id)
            //         ->where('car_id', $car_id)
            //         ->where('type', $type)
            //         ->first();
            //     if ($car_media) {
            //         $car_media->delete();
            //     }
            // }
            return true;
        }
        return false;
    }

    public function view_menu_admin($data, $parent=0, $text=''){
        $i=1;
        foreach ($data as $k=>$v) {
            $t=$i++;
            if ($v->parent_id == $parent) {
                unset($data[$k]);
                $id = $v->id;
                echo '<li class="dd-item" data-id="' . $v->id . '">
                                    <div class="dd-handle" data-items="id_'.$t.'">' . $v->name . '</div>
                                     <div class="action">
                                     <div class="btn-group link_v">
                                        <button class="btn dropdown-toggle drop_action" data-toggle="dropdown"><span class="caret"></span></button>
                                        <ul class="dropdown-menu" style="min-width: 40px !important; padding: 5px">
                                          <li><a href="'.base_url('adm/menu/edit/' . $v->id.'?p='.$v->position.'').'" style="color: #0011ca">Sửa</a></li>
                                          <li><a href="'.base_url('adm/menu/delete/' . $v->id).'"style="color: red"onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\')" >Xóa</a></li>
                                        </ul>
                                      </div>
                                     </div>
                                    <ol class="dd-list">';
                view_menu_admin($data, $id, $text . '');
                echo '</ol></li>';
            }
        }
    }
}
