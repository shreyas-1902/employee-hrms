<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryStructure extends Model
{
    protected $fillable = [
        'employee_id',
        'salary_month',
        'basic_salary',
        'hra',
        'da',
        'bonus',
        'deductions',
        'tax',
        'net_salary'
    ];

    // ✅ ADD THIS
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


}