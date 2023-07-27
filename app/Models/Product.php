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
        "prenium", "active", "sub_categorie_id"
    ];
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
    public function SubCategorie()
    {
        return $this->belongsTo(SubCategorie::class);
    }
}
