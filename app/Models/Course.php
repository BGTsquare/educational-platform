<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- ADD THIS LINE
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory; // <-- AND ADD THIS LINE

    // Your existing relationship methods are below and are correct
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
