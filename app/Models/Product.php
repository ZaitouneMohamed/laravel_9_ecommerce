<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "title", "slug", "description",
        "price", "old_price",
        "prenium", "active", "sub_categorie_id", "categorie_id"
    ];
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
    public function SubCategorie()
    {
        return $this->belongsTo(SubCategorie::class);
    }
    public function Images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
