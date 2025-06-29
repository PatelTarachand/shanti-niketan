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
        // Only add foreign key if applications table exists and admins table exists
        if (Schema::hasTable('applications') && Schema::hasTable('admins')) {
            try {
                Schema::table('applications', function (Blueprint $table) {
                    $table->foreign('reviewed_by')->references('id')->on('admins')->onDelete('set null');
                });
            } catch (\Exception $e) {
                // Foreign key might already exist, ignore the error
                if (!str_contains($e->getMessage(), 'already exists')) {
                    throw $e;
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['reviewed_by']);
        });
    }
};
