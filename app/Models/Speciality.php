<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = false;
    protected $table = 'specialities';

    public function department(){
        return $this->belongsTo(Department::class );
    }
}
