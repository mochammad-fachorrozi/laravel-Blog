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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('image_decsription')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('content')->nullable();
            $table->string('keywords')->nullable();
            $table->string('tags')->nullable();
            $table->integer('visited')->nullable();
            $table->timestamps();
            $table->enum('is_accept', [0, 1, 2])->default(0); // 0=wait, 1=rejected, 2=accept
            $table->text('message')->nullable();
            $table->date('publish_at')->nullable();
            $table->enum('is_active', [0, 1])->default(0);
            $table->foreignId('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
