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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table -> string("title");
            $table -> string("cover_image")->default("post.jpg");
            $table -> string("summary")->nullable();
            $table -> text("content");
            $table -> foreignId("category_id");
            $table -> foreignId("user_id");
            $table -> enum("status", ["published", "unpublished"])->default("published");
             $table->boolean("editor_favorite")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
