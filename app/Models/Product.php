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
        "prenium", "active",
        "image", "sub_categorie_id"
    ];
    public function SubCategorie()
    {
        return $this->belongsTo(SubCategorie::class);
    }
}
