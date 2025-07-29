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
        Schema::table('partnerships', function (Blueprint $table) {
            $table->string('status')->default('publié')->after('is_active');
        });

        Schema::table('references', function (Blueprint $table) {
            $table->string('status')->default('publié')->after('is_active');
        });

        Schema::table('intro_sections', function (Blueprint $table) {
            $table->string('status')->default('publié')->after('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partnerships', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('references', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('intro_sections', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}; 