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
        Schema::table('late_entries', function (Blueprint $table) {
            $table->string('formatted_time')->nullable()->after('time'); // Make this field nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('late_entries', function (Blueprint $table) {
            $table->dropColumn('formatted_time');
        });
    }
};
