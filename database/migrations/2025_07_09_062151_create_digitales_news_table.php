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
        Schema::create('digitales_news', function (Blueprint $table) {
            $table->id('news_id');
            $table->string('news_title', 255);
            $table->string('news_des', 255);
            $table->string('news_link', 500);
            $table->string('news_cover', 255);
            $table->dateTime('created_at')->useCurrent()->nullable();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate()->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('digitales_news');
    }
};
