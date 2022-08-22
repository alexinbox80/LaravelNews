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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Имя заказчика');
            $table->char('phone', 10)->comment('Телефон заказчика');
            $table->char('email', 150)->comment('Электронная почта заказчика');
            $table->char('url', 250)->comment('URL страницы');
            $table->text('description')->comment('Описание заказа');
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
        Schema::dropIfExists('orders');
    }
};
