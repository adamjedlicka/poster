<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SortScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $sort = request('sort', 'newest');

        if ($sort == 'newest') {
            $builder->orderBy('created_at', 'desc');
        } elseif ($sort == 'oldest') {
            $builder->orderBy('created_at', 'asc');
        } else {
            $builder->orderBy('created_at', 'desc');
        }
    }
}
