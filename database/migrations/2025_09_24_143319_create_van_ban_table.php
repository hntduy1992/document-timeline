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
        Schema::create('van_ban', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_don_vi')->nullable();
            $table->unsignedInteger('id_user')->nullable();
            $table->date('ngay_ban_hanh');
            $table->boolean('trang_thai')->default(false);
            $table->string('so_hieu')->nullable();
            $table->string('tieu_de')->nullable();
            $table->string('trich_yeu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('van_ban');
    }
};
