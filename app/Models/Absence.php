<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
