<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Hapus kolom 'image' lama dari semua tabel karena
     * gambar sekarang dikelola oleh Spatie Media Library.
     */
    public function up(): void
    {
        if (Schema::hasColumn('kemahasiswaan', 'image')) {
            Schema::table('kemahasiswaan', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }

        if (Schema::hasColumn('dosen', 'image')) {
            Schema::table('dosen', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }

        if (Schema::hasColumn('staff', 'image')) {
            Schema::table('staff', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }

        if (Schema::hasColumn('produk', 'image')) {
            Schema::table('produk', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kemahasiswaan', function (Blueprint $table) {
            $table->string('image')->nullable()->after('judul');
        });

        Schema::table('dosen', function (Blueprint $table) {
            $table->string('image')->nullable()->after('nama');
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->string('image')->nullable()->after('nama');
        });

        Schema::table('produk', function (Blueprint $table) {
            $table->string('image')->nullable()->after('nama');
        });
    }
};