<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->after('password'); // dosen / mahasiswa
            $table->string('nim')->nullable()->after('role'); // hanya untuk mahasiswa
            $table->string('token')->nullable()->after('nim'); // hanya untuk dosen
            $table->unsignedBigInteger('dosen_id')->nullable()->after('token'); // untuk mahasiswa
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'nim', 'token', 'dosen_id']);
        });
    }
};
