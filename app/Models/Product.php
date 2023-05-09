<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "title", "slug", "description",
        "price", "old_price",
        "image", "inStock", "sub_categories_id"
    ];
    public function SubCategorie()
    {
        return $this->belongsTo(SubCategorie::class);
    }
}
