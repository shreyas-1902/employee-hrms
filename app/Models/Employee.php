<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'department',
        'designation',
        'salary'
    ];

    public function attendances()
{
    return $this->hasMany(Attendance::class);
}

public function salary()
{
    return $this->hasOne(SalaryStructure::class);
}

public function salaryStructures()
{
    return $this->hasMany(SalaryStructure::class);
}

}

