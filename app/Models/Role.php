<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permissions;

class Role extends Model
{
    use HasFactory;
    
    public $timestamps = true;
    protected $guarded = [];

    protected $with = ['permissions'];

    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'permission_roles', 'role_id', 'permission_id');
    }
}
