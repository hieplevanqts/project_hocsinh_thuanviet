<?php

namespace Modules\Dashboard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
    use HasFactory;
    use NodeTrait;
    protected $fillable = ['name', 'type', 'url', 'position', 'parent_id', 'status'];
    protected $with = ['categories'];
    protected static function newFactory()
    {
        return \Modules\Dashboard\Database\factories\MenuFactory::new();
    }

    public function categories()
    {
        return $this->hasMany(Menu::class , 'parent_id', 'id');
    }

    public function sortMenu($array)
    {
        foreach ($array as $key => $value) {
            if(isset($value['children']))
            {
                foreach ($value['children'] as $k => $v) {
                    $c = Menu::find($v['id']);
                    $c['parent_id'] = $value['id'];
                    if(isset($v['children']))
                    {
                        if(count($v['children']) == 1)
                        {
                            $arr = [$v['children']];
                        }else{
                            $arr = $v['children'];
                        }
                        Menu::sortMenu($arr);
                    }
                    $c->save();
                }
            }
        }
    }
}
