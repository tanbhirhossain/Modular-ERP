<?php

namespace Modules\HRM\Models\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\HRM\Database\Factories\EmployeeSkillFactory;

class EmployeeSkill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EmployeeSkillFactory
    // {
    //     // return EmployeeSkillFactory::new();
    // }
}
