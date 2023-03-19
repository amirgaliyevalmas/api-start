<?php
/**
 * Created by PhpStorm.
 * User: almasamirgaliyev
 * Date: 19.03.2023
 * Time: 19:55
 */

namespace App\Traits;

use App\Http\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * @param Builder $builder
     * @param FilterInterface $filter
     *
     * @return Builder
     */
    public function scopeFilter(Builder $builder, FilterInterface $filter)
    {
        $filter->apply($builder);

        return $builder;
    }
}