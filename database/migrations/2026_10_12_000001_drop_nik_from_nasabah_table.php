<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('nasabah', function (Blueprint $table) {
            if (Schema::hasColumn('nasabah', 'nik')) {
                $table->dropColumn('nik');
            }
        });
    }

    public function down(): void
    {
        Schema::table('nasabah', function (Blueprint $table) {
            if (!Schema::hasColumn('nasabah', 'nik')) {
                $table->string('nik')->nullable()->unique();
            }
        });
    }
};
