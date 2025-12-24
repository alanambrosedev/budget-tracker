<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'is_completed'];

    protected $casts = ['is_completed' => 'boolean'];

    protected $touches = ['user'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeInCompleted(Builder $query)
    {
        return $query->where('is_completed', false);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
