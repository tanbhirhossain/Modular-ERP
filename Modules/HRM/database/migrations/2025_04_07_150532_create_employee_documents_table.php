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
        Schema::create('employee_documents', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id', 50); // Keep emp_id as string
            $table->string('document_name');
            $table->string('document_type');
            $table->string('file_path');
            $table->date('expiry_date')->nullable();
            $table->unsignedBigInteger('created_by');
        
            // Add index for emp_id and created_by
            $table->index('emp_id');
            $table->index('created_by');
        
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
        
            $table->foreign('emp_id')->references('emp_id')->on('employees')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_documents');
    }
};
