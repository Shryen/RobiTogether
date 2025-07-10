<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Grades;

class Subject extends Model
{
    public function grades()
    {
        return $this->hasMany(Grades::class);
    }
}
