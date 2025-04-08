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
        Schema::create('salary_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id', 50); // Keep emp_id as string
            $table->decimal('basic_pay', 10, 2); 
            $table->decimal('house_rent', 10, 2); 
            $table->decimal('medical_allowance', 10, 2);
            $table->decimal('conv_allowance', 10, 2);
            $table->decimal('monthly_salary', 10, 2);
            $table->string('bank_name', 150)->nullable();
            $table->string('bank_acc_name', 150)->nullable();
            $table->string('bank_acc_no', 20)->nullable();
            $table->enum('method', ['bank', 'cash', 'cheque','others'])->default('bank');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        
            // Add index for emp_id and created_by
            $table->index('emp_id');
            $table->index('created_by');
            $table->index('updated_by');
        
            $table->foreign('emp_id')->references('emp_id')->on('employees')->onDelete('cascade'); 
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
        Schema::dropIfExists('salary_profiles');
    }
};
