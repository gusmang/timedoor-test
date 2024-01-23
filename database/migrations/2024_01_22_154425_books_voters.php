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
        Schema::create('books_voters', function (Blueprint $table) {
            $table->id();
            $table->text('voters_name');
            $table->unsignedBigInteger('id_books');
            $table->integer('rates');
            $table->timestamps();

            $table->foreign('id_books')
                ->references('id')
                ->on('books_list')
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
        Schema::dropIfExists('books_voters');
    }
};
