<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function playlistVideo()
    {
        return $this->belongsTo(PlaylistVideo::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return  $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when(
            $filters['user'] ?? false,
            fn($query, $user) =>
            $query->whereHas(
                'user',
                fn($query) =>
                $query->where('username', $user)
            )
        );
    }
}
