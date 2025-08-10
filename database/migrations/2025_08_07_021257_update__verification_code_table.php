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
        Schema::table('verification_code', function (Blueprint $table) {
            $table->renameColumn('exprise_at','expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('verification_code', function (Blueprint $table) {
            $table->renameColumn('expires_at','exprise_at');
        });
    }
};
