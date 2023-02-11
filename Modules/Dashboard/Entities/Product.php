<?php

namespace Modules\Dashboard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ProductCategory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $with = ["productCategory"];
    protected static function newFactory()
    {
        return \Modules\Dashboard\Database\factories\ProductFactory::new();
    }

    public function productCategory()
    {
        return $this->hasMany(ProductCategory::class);
    }
}
