<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            //             Laravel sẽ tự động hiểu rằng user_id tham chiếu đến cột id trong bảng users vì:

            // Theo chuẩn Laravel, bảng của model User mặc định là users.

            // constrained() sẽ tự động lấy tên bảng dựa trên tên cột (bỏ _id đi).
            $table->enum('status', ['pending', 'processing', 'completed', 'canceled'])->default('pending');
            $table->decimal('total_price', 10, 2);
            $table->timestamp('order_date')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};