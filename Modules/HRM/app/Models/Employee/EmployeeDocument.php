<?php

namespace Modules\HRM\app\Models\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\HRM\Database\Factories\EmployeeDocumentFactory;

class EmployeeDocument extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EmployeeDocumentFactory
    // {
    //     // return EmployeeDocumentFactory::new();
    // }
}
