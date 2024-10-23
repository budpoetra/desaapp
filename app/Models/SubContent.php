<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubContent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function subSubContents()
    {
        return $this->hasMany(SubSubContent::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
