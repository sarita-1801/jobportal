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
            // Only add 'resume' if it doesn't exist
        if (!Schema::hasColumn('applications', 'resume')) {
            $table->string('resume')->after('seeker_id');
        }

        // Only add 'status' if it doesn't exist
        if (!Schema::hasColumn('applications', 'status')) {
            $table->enum('status', ['submitted','reviewed','shortlisted','accepted','rejected'])
                  ->default('submitted')
                  ->after('resume');
        }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            if (Schema::hasColumn('applications', 'resume')) {
                $table->dropColumn('resume');
            }
            if (Schema::hasColumn('applications', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
