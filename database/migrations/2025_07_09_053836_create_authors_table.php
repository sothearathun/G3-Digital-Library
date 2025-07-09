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
        Schema::create('authors', function (Blueprint $table) {
            $table->id('author_id');
            $table->string('author_name', 50);
            $table->enum('author_categories', ['popular-author', 'default-author'])->default('default-author')->nullable();
            $table->string('author_image', 50)->nullable();
            $table->string('author_bio_link', 500)->nullable();
            $table->timestamps(0); // created_at and updated_at with CURRENT_TIMESTAMP
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
};
