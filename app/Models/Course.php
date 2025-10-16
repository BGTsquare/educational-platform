<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // A course has many materials, enrollments, and payments.
    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
