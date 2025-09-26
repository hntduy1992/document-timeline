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
            $table->string('so_hieu');
            $table->date('ngay_ban_hanh');
            $table->string('tieu_de');
            $table->unsignedInteger('id_don_vi')->nullable();
            $table->unsignedInteger('id_user')->nullable();
            $table->string('trich_yeu')->nullable();
            $table->string('id_tags')->nullable();
            $table->boolean('trang_thai')->default(false);
            $table->timestamps();
        });
        Schema::create('van_ban_file', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_van_ban');
            $table->string('path');
            $table->string('name',255);
            $table->string('extension',5);
            $table->integer('size');
            $table->timestamps();
        });
        Schema::create('tags', function (Blueprint $table)
        {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('van_ban');
        Schema::dropIfExists('tags');
    }
};
