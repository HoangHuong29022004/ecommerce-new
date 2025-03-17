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
        Schema::create('don_hang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoi_dung_id')->constrained('nguoi_dung')->onDelete('cascade');
            $table->string('ma_don_hang')->unique();
            $table->decimal('tong_tien', 12, 2);
            $table->string('ten_nguoi_nhan');
            $table->string('so_dien_thoai');
            $table->text('dia_chi_giao_hang');
            $table->text('ghi_chu')->nullable();
            $table->enum('trang_thai', ['cho_xu_ly', 'dang_xu_ly', 'dang_giao', 'da_giao', 'da_huy'])->default('cho_xu_ly');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hang');
    }
};
