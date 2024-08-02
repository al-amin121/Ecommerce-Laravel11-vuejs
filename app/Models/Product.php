<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'offer_price', 'description', 'main_category_id', 'sub_category_id', 'brand_id'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    // A Product belongs to a MainCategory
    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class);
    }

    // A Product belongs to a SubCategory
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    // Brand
    public function brand()
    {
        return $this->belongsTo( Brand::class);
    }
}
