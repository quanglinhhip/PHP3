<?php

use App\Models\Category;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->index();
            $table->string('name')->unique();
            $table->string('sku')->unique();
            $table->string('img_thumb')->nullable()->comment('Đây là ảnh khi hiển thị list');
            $table->text('overview')->nullable()->comment('Mô tả ngắn');
            $table->mediumText('content')->nullable()->comment('Nội dung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
