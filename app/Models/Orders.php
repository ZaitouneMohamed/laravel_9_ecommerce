<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        "order_number","customar_name",
        "customar_number","customar_email",
        "category","sub_categorie",
        "product","qty",
    ];
}
