<?php 

namespace App\Http\Helpers;

class Menu {
    public static function view_menu_admin($data,$parent=0,$text=''){
        // echo '<pre>';
        // print_r($data);
        // die;

        $i=1;
        foreach ($data as $k=>$v) {
            $t=$i++;
            if ($v->parent_id == $parent) {
                // dd($data[$k]);
                unset($data[$k]);
                $id = $v->id;
    
                echo '<li class="dd-item" data-id="' . $v->id . '">
                                    <div class="dd-handle" data-items="id_'.$t.'">' . $v->name . '</div>
                                     <div class="action">
                                     <div class="btn-group link_v">
                                        <button class="btn dropdown-toggle drop_action" data-toggle="dropdown"><span class="caret"></span></button>
                                        <ul class="dropdown-menu" style="min-width: 40px !important; padding: 5px">
                                          <li><a href="'.asset('adm/menu/edit/' . $v->id.'?p='.$v->position.'').'" style="color: #0011ca">Sửa</a></li>
                                          <li><a href="'.asset('adm/menu/delete/' . $v->id).'"style="color: red"onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\')" >Xóa</a></li>
                                        </ul>
                                      </div>
                                     </div>
    
    
                                    <ol class="dd-list">';
    
                                    Menu::view_menu_admin($data, $id, $text . '');
    
                echo '</ol>
                                </li>';
            }
        }
    } 
}

?>