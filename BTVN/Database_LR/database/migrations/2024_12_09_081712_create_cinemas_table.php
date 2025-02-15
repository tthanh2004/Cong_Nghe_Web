<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động (primary key)
            $table->string('name'); // Tên rạp chiếu
            $table->string('location'); // Địa chỉ rạp chiếu
            $table->integer('total_seats'); // Tổng số ghế ngồi
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cinemas');
    }
};
