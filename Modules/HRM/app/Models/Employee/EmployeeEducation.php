<?php

namespace Modules\HRM\app\Models\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\HRM\Database\Factories\EmployeeEducationFactory;

class EmployeeEducation extends Model
{
    use HasFactory;
    protected $table = 'employee_educations';


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EmployeeEducationFactory
    // {
    //     // return EmployeeEducationFactory::new();
    // }
}
