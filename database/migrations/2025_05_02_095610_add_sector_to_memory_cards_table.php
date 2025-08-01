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
        Schema::table('memory_cards', function (Blueprint $table) {
            $table->string('sector')->nullable()->after('continent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('memory_cards', function (Blueprint $table) {
            $table->dropColumn('sector');
        });
    }
};
