<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;
    protected $fillable = [
        "begin", "end", "active"
    ];
    public function getStatueAttribute($value)
    {
        if ($this->active) {
            // return '<span class="badge badge-center rounded-pill bg-success"></span>active';
            return '<span class="legend-indicator bg-success"></span>active';
        } else {
            return '<span class=""></span>disabled';
        }
    }
    public function getFullTimeAttribute()
    {
        return $this->begin . '-' . $this->end;
    }
}
