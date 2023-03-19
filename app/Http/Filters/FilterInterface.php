<?php
/**
 * Created by PhpStorm.
 * User: almasamirgaliyev
 * Date: 19.03.2023
 * Time: 19:53
 */

namespace App\Http\Filters;



use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public function apply(Builder $builder);
}