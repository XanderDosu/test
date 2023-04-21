<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\QueryFilter;

class Lot extends Model
{
    use HasFactory;
    protected $table = 'lots';

    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }
}
