<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use App\Models\Permissions;
class Permissions extends Model
{
    use HasFactory;
    use NodeTrait;
    protected $with = ['permissionsChildrent'];
    public function permissionsChildrent()
    {
        return $this->hasMany(Permissions::class , 'parent_id', 'id');
    }
}
