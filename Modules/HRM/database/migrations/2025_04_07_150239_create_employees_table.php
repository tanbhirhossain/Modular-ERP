<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('biometric_id')->nullable()->unique();
            $table->string('department_code')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->string('emp_id')->unique();
            $table->string('phone', 15);
            $table->string('address', 255)->nullable();
            $table->string('photo')->nullable();
            $table->date('joining_date');
            $table->date('dob')->nullable();
            $table->date('card_issue_date')->nullable();
            $table->string('password')->default(bcrypt('amz12345'));
            $table->string('nid_no')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        
            // Add indexes for faster searching
            $table->index('emp_id');
            $table->index('department_id');
            $table->index('created_by');
            $table->index('updated_by');
        
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
