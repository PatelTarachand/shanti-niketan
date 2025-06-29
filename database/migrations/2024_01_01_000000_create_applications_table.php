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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_number')->unique();
            
            // Personal Information
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('guardian_phone')->nullable();
            
            // Address Information
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            
            // Course Information
            $table->string('course');
            $table->string('branch')->nullable();
            $table->enum('category', ['general', 'obc', 'sc', 'st', 'other'])->nullable();
            
            // Previous Education
            $table->string('previous_qualification')->nullable();
            $table->decimal('previous_marks', 8, 2)->nullable();
            $table->decimal('previous_percentage', 5, 2)->nullable();
            $table->string('previous_school_college')->nullable();
            $table->integer('previous_passing_year')->nullable();
            
            // Documents and Status
            $table->json('documents')->nullable();
            $table->enum('status', ['pending', 'under_review', 'approved', 'rejected', 'waitlisted'])->default('pending');
            $table->text('remarks')->nullable();
            
            // Payment Information
            $table->boolean('application_fee_paid')->default(false);
            $table->decimal('application_fee_amount', 8, 2)->nullable();
            $table->string('payment_reference')->nullable();
            
            // Timestamps and Review
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->timestamps();
            
            // Foreign Keys
            $table->foreign('reviewed_by')->references('id')->on('admins')->onDelete('set null');
            
            // Indexes
            $table->index(['status', 'created_at']);
            $table->index(['course', 'status']);
            $table->index('email');
            $table->index('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
