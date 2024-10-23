<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EbookCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function ebooks()
    {
        return $this->hasMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
