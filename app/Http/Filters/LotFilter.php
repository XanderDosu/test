<?php

namespace App\Http\Filters;

class LotFilter extends QueryFilter
{
    public function category_id($id)
    {
        return $this->builder->whereHas('categories', function($q) use ($id) {
            $q->where('category_id', '=', $id);
        });
    }
}
