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
        Schema::create('reading_progress', function (Blueprint $table) {
            $table->id('progress_id');
            $table->unsignedBigInteger('book_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->integer('current_page');
            $table->integer('page_remaining');
            $table->decimal('completion_percentage', 5, 2)->default(0.00)->nullable();
            $table->timestamp('last_read_at')->useCurrent()->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reading_progress');
    }
};
