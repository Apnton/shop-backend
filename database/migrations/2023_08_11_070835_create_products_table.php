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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->text('content')->nullable();
            $table->decimal('price', 8, 2)->defoult(0.0);
            $table->integer('quantity')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('group_id');

            $table->string('thumbnails')->nullable();
            $table->tinyInteger('is_published')->default(0);
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->foreign('color_id')
                ->references('id')
                ->on('colors');

            $table->foreign('group_id')
                ->references('id')
                ->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
