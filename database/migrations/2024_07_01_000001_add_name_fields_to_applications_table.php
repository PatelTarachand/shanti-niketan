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
        Schema::table('applications', function (Blueprint $table) {
            // Add separate name fields
            $table->string('first_name')->nullable()->after('name');
            $table->string('middle_name')->nullable()->after('first_name');
            $table->string('last_name')->nullable()->after('middle_name');
            
            // Add father occupation
            $table->string('father_occupation')->nullable()->after('mother_name');
            
            // Add new educational fields
            $table->string('last_exam')->nullable()->after('category');
            $table->string('board_university')->nullable()->after('last_exam');
            $table->string('percentage')->nullable()->after('board_university');
            $table->integer('passing_year')->nullable()->after('percentage');
            $table->string('entrance_exam')->nullable()->after('passing_year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn([
                'first_name',
                'middle_name', 
                'last_name',
                'father_occupation',
                'last_exam',
                'board_university',
                'percentage',
                'passing_year',
                'entrance_exam'
            ]);
        });
    }
};
