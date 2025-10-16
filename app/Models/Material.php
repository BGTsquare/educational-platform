<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    // A material belongs to one course.
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
