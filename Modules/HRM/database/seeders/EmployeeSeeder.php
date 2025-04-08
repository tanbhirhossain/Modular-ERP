<?php
namespace Modules\HRM\Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Modules\HRM\app\Models\Employee\Department;
use Modules\HRM\app\Models\Employee\Employee;  // Corrected path
use Modules\HRM\app\Models\Employee\SalaryProfile; // Corrected path
use Modules\HRM\app\Models\Employee\EmployeeDocument; // Corrected path
use Modules\HRM\app\Models\Employee\EmployeeExperience; // Corrected path
use Modules\HRM\app\Models\Employee\EmployeeSkill; // Corrected path
use Modules\HRM\app\Models\Employee\EmployeeEducation; // Corrected path

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        //Seed Departments
        $departments = [];
        for($i=0; $i<5; $i++){
            $departments[] = Department::create([
                'name' => $faker->unique()->company() . 'Dept',
                'code' => Null,
                'created_by' => 1,

            ]);
        }

        //EmployeeMaster
        for($i=0; $i<10; $i++){
            $department = $faker->randomElement($departments);

            $employee = Employee::create([
                'name' => $faker->name(),
                'designation' => $faker->jobTitle(),
                'biometric_id' => $faker->uuid(),
                'department_id' => $department->id,
                'emp_id' => $faker->unique()->numberBetween(1000,9999),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'photo' => $faker->imageUrl(),
                'joining_date' => $faker->date(),
                'dob' => $faker->date(),
                'card_issue_date' => $faker->date(),
                'password' => bcrypt('password123'),
                'nid_no' => $faker->unique()->numerify('####-####-####'),
                'blood_group' => $faker->randomElement(['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-']),
                'emergency_contact' => $faker->phoneNumber,
                'created_by' => 1,
            ]);
        }

        // Create salary profile
        SalaryProfile::create([
            'emp_id' => $employee->emp_id,
            'basic_pay' => $faker->randomFloat(2, 20000, 70000),
            'house_rent' => $faker->randomFloat(2, 5000, 15000),
            'medical_allowance' => $faker->randomFloat(2, 1000, 5000),
            'conv_allowance' => $faker->randomFloat(2, 1000, 5000),
            'monthly_salary' => $faker->randomFloat(2, 30000, 80000),
            'bank_name' => $faker->company,
            'bank_acc_name' => $faker->name,
            'bank_acc_no' => $faker->bankAccountNumber,
            'method' => $faker->randomElement(['bank', 'cash', 'cheque', 'others']),
            'created_by' => 1,
        ]);

        // Employee document
        EmployeeDocument::create([
            'emp_id' => $employee->emp_id,
            'document_name' => 'NID',
            'document_type' => 'National ID',
            'file_path' => $faker->filePath(),
            'expiry_date' => $faker->date(),
            'created_by' => 1,
        ]);

        // Employee experience
        EmployeeExperience::create([
            'emp_id' => $employee->emp_id,
            'company_name' => $faker->company,
            'position' => $faker->jobTitle,
            'start_date' => $faker->date(),
            'end_date' => $faker->date(),
            'description' => $faker->text(),
            'created_by' => 1,
        ]);

        // Employee skill
        EmployeeSkill::create([
            'emp_id' => $employee->emp_id,
            'skill_name' => $faker->word,
            'proficiency_level' => $faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
            'years_of_experience' => $faker->numberBetween(1, 10),
            'created_by' => 1,
        ]);

        // Employee education
        EmployeeEducation::create([
            'emp_id' => $employee->emp_id,
            'institution_name' => $faker->company,
            'degree' => $faker->word,
            'field_of_study' => $faker->word,
            'start_date' => $faker->date(),
            'end_date' => $faker->date(),
            'graduation_year' => $faker->year(),
            'created_by' => 1,
        ]);
    }
    
}
