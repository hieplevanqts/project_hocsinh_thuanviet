<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    // public function productCategory()
    // {
    //     return $this->belongsToMany(ProductCategory::class, "product_categories", 'product_id', 'category_id');
    // }
}
