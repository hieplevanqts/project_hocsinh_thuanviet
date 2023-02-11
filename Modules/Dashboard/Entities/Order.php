<?php

namespace Modules\Dashboard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'orders';
    
    protected static function newFactory()
    {
        return \Modules\Dashboard\Database\factories\OrderFactory::new();
    }
}
