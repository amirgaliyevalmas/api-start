<?php
/**
 * Created by PhpStorm.
 * User: almasamirgaliyev
 * Date: 19.03.2023
 * Time: 20:19
 */

namespace App\Http\Filters;


use Illuminate\Contracts\Database\Eloquent\Builder;

class AreaFilter extends AbstractFilter
{
    public const DEPARTMENT_ID = 'department_id';

    protected function getCallbacks(): array
    {
      return [
           self::DEPARTMENT_ID => [$this, 'departmentId']
       ];
    }

    public function departmentId(Builder $builder, $value){
        $builder->where('department_id', $value);
    }

}