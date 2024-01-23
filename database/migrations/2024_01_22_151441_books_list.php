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
        //
        Schema::create('books_list', function (Blueprint $table) {
            $table->id();
            $table->text('books_name');
            $table->unsignedBigInteger('id_books_category');
            $table->unsignedBigInteger('id_books_author');
            $table->double('rating')->default(0);
            $table->integer('voter')->default(0);
            $table->timestamps();

            $table->foreign('id_books_category')
                ->references('id')
                ->on('books_category')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('id_books_author')
                ->references('id')
                ->on('books_author')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('books_list');
    }
};
