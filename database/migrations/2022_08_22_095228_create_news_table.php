<?php

use App\Models\News;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->comment('Заголовок новости');
            $table->string('author', 255)->comment('Автор новости')->nullable();
            $table->enum('status', [
                News::DRAFT, News::ACTIVE, News::BLOCKED
            ])->default(News::DRAFT)->comment('Статус новости');
            $table->text('description')->comment('Текст новости');
            $table->string('image', 255)->comment('Картинка новости')->nullable();
            $table->boolean('is_private')->default(false)->comment('Доступна ли новость неавторизованным');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
