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
            // Create Units table
        Schema::create('units', function (Blueprint $table) {
            $table->id(); // unit ID
            $table->string('name'); // ឈ្មោះឯកតា
            $table->string('symbol'); // សញ្ញាឯកតា
            $table->timestamps();
        });
        // Create Categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); //category ID
            $table->string('name'); // ឈ្មោះប្រភេទ
            $table->text('description')->nullable(); // ការពិពណ៌នា
            $table->timestamps();
        });

        // បង្កើតតារាងផលិតផល
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // product ID
            $table->string('name'); // ឈ្មោះផលិតផល
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key to categories table
            $table->foreignId('unit_id')->constrained()->onDelete('cascade'); // Foreign key to units table
            $table->string('sku')->unique(); // ស្តុកគូ (Stock Keeping Unit)
            $table->integer('quantity')->default(0); // បរិមាណផលិតផល
            $table->decimal('price', 8, 2); // តម្លៃផលិតផល
            $table->text('description')->nullable(); // ការពិពណ៌នា
            $table->boolean('is_active')->default(true); // ស្ថានភាពសកម្ម
            $table->string('image')->nullable(); // ផ្លូវរូបភាពផលិតផល

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('units');
    }
};
