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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by');
        
            // Foreign key for created_by (references users table)
            $table->foreign('created_by')->references('id')->on('users');
        
            // Supervisor and department head columns
            $table->unsignedBigInteger('supervisor_1')->nullable()->after('created_by');
            $table->unsignedBigInteger('supervisor_2')->nullable()->after('supervisor_1');
            $table->unsignedBigInteger('supervisor_3')->nullable()->after('supervisor_2');
            $table->unsignedBigInteger('department_head')->nullable()->after('supervisor_3');
        
            // Foreign key constraints for supervisors and department head
            $table->foreign('supervisor_1')->references('id')->on('users');
            $table->foreign('supervisor_2')->references('id')->on('users');
            $table->foreign('supervisor_3')->references('id')->on('users');
            $table->foreign('department_head')->references('id')->on('users');
        
            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
