<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'niy',
        'subject_id',
        'start_date',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
