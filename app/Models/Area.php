<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    use Filterable;


    protected $guarded = false;
    protected $table = 'areas';

    public function department(){
        return $this->belongsTo(Department::class );
    }

    public function users(){
        return $this->belongsToMany(User::class, 'area_users', 'area_id', 'user_id');
    }
}
