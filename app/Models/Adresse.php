<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'name',
        'phone_number',
        'postel_code',
        'city',
        'adresse',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
