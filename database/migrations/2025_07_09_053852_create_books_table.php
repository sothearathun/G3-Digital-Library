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
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id');
            $table->string('book_title', 200);
            $table->text('description');
            $table->integer('total_pages');
            $table->enum('book_categories', ['trending', 'best-selling', 'newly-added']);
            $table->string('author_name', 50);
            $table->date('released_date');
            $table->text('book_genres');
            $table->string('file_path', 100);
            $table->enum('file_format', ['pdf'])->default('pdf')->nullable();
            $table->string('book_cover', 255);
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->date('updated_at')->nullable();
            $table->text('prologue');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
