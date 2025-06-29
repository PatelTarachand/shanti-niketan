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
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('student_id')->nullable(); // Roll number during study
            $table->string('course');
            $table->string('branch')->nullable();
            $table->integer('passing_year');
            $table->integer('admission_year')->nullable();
            $table->string('current_company')->nullable();
            $table->string('current_position')->nullable();
            $table->string('current_location')->nullable();
            $table->decimal('current_salary', 10, 2)->nullable();
            $table->text('bio')->nullable();
            $table->text('testimonial')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('website_url')->nullable();
            $table->json('achievements')->nullable();
            $table->json('skills')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('show_contact')->default(false);
            $table->boolean('available_for_mentoring')->default(false);
            $table->integer('experience_years')->default(0);
            $table->string('industry')->nullable();
            $table->text('address')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
