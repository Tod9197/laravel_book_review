<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('post_genre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')
            ->constrained()
            ->onDelete('cascade');//2024/08/10追加
            $table->foreignId('genre_id')
            ->constrained()
            ->onDelete('cascade');//2024/08/10追加
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('post_genre');
    }
};
