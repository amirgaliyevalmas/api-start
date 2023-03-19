<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'departments';

    public function spesialities(){
        return $this->hasMany('department_id', 'id', Speciality::class);
    }
}
