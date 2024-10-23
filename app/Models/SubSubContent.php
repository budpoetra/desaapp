<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubContent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subContent()
    {
        return $this->belongsTo(SubContent::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
