<?php

use App\Models\Category;
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
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->foreignIdFor(Category::class)
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('img')->nullable();
            $table->text('price')->nullable();


            $table->string('title2')->nullable();
            $table->text('text')->nullable();

            $table->json('gallery')->nullable();
            $table->string('video')->nullable();
            $table->string('poster')->nullable();

            $table->json('file')->nullable();

            $table->string('desc_to')->nullable();
            $table->string('desc_from')->nullable();

            $table->string('published')->default(1);
            $table->json('params')->nullable();
            $table->json('property')->nullable();

            $table->string('metatitle')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('sorting')->default(999);

            $table->timestamps();
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
