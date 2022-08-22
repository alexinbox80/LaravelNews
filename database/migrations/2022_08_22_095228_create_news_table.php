<?php

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
            $table->bigInteger('category_id')->comment('ID категории');
            $table->string('title')->comment('Заголовок новости');
            $table->string('author')->comment('Автор новости');
            $table->string('status')->comment('Статус новости');
            $table->text('description')->comment('Описание новости');
            $table->boolean('is_private')->default(false)->cooment('Доступна ли новость неавторизованным');
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
