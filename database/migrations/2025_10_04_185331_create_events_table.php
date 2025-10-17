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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');                     // عنوان رویداد
            $table->string('slug')->unique();            // آدرس یکتا برای SEO
            $table->text('description')->nullable();     // توضیح کوتاه
            $table->longText('content')->nullable();     // توضیحات کامل یا متن مراسم
            $table->string('image')->nullable();         // تصویر اصلی رویداد
            $table->string('video_url')->nullable();     // ویدیو یا لینک پخش
            $table->date('event_date');                  // تاریخ برگزاری
            $table->time('event_time')->nullable();      // ساعت برگزاری
            $table->string('location')->nullable();      // محل برگزاری (مسجد، حسینیه، ...)
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null'); // دسته‌بندی (مثلاً عزاداری، سخنرانی)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');     // برگزارکننده / ثبت‌کننده
            $table->enum('status', ['draft', 'published'])->default('draft'); // پیش‌نویس یا منتشرشده
            $table->unsignedInteger('views')->default(0); // بازدیدها
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
