<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = false;


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeByUser(Builder $query): Builder
    {
        return $query->where('user_id', auth()->id());
    }

}
