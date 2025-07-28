គម្រោង CRUD

# គម្រោង CRUD
គម្រោង CRUD (បង្កើត, អាន, ធ្វើបច្ចុប្បន្នភាព, លុប) គឺជាការសំខាន់សម្រាប់ការយល់ដឹងអំពីរបៀបគ្រប់គ្រងទិន្នន័យនៅក្នុងកម្មវិធី។ វាផ្តល់នូវមូលដ្ឋានសម្រាប់ការបង្កើតប្រព័ន្ធស្មុគស្មាញជាងមុន។ នៅក្នុងផ្នែកនេះ យើងនឹងស្វែងយល់អំពីរបៀបបង្កើតកម្មវិធី CRUD សាមញ្ញដោយប្រើបច្ចេកវិទ្យាផ្សេងៗ។

## គម្រោងទី ១៖ កម្មវិធីបញ្ជីផលិតផលសាមញ្ញ
`composer create-project laravel/laravel Laravel12Demo`

### ជំហានទី ១៖ កំណត់គម្រោង
- បង្កើតគម្រោង Laravel ថ្មីដោយប្រើ Composer។
- បើកគម្រោងក្នុងកម្មវិធីកែសម្រួលកូដរបស់អ្នក។
- បន្ថែមការតភ្ជាប់ទៅកាន់មូលដ្ឋានទិន្នន័យក្នុងឯកសារ `.env` របស់អ្នក។
- បង្កើតម៉ូដែល `Product` និងមីក្រេស្យុងសម្រាប់តារាងផលិតផល៖
```bash
php artisan make:model Product -m
```
- បន្ថែមកូដសម្រាប់បង្កើតតារាងផលិតផលក្នុងឯកសារ migration ដែលបានបង្កើត៖
```php
public function up()
{
    // Create Units table
    Schema::create('units', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // ឈ្មោះឯកតា
        $table->string('symbol'); // សញ្ញាឯកតា
        $table->timestamps();
    });
    // Create Categories table
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // ឈ្មោះប្រភេទ
        $table->text('description')->nullable(); // ការពិពណ៌នា
        $table->timestamps();
    });

    // បង្កើតតារាងផលិតផល
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key to categories table
        $table->foreignId('unit_id')->constrained()->onDelete('cascade'); // Foreign key to units table
        $table->string('sku')->unique(); // ស្តុកគូ
        $table->integer('quantity')->default(0); // បរិមាណផលិតផល
        $table->decimal('price', 8, 2); // តម្លៃផលិតផល
        $table->text('description')->nullable(); // ការពិពណ៌នា
        $table->boolean('is_active')->default(true); // ស្ថានភាពសកម្ម
        $table->string('image')->nullable(); // ផ្លូវរូបភាពផលិតផល   

        $table->timestamps();
    });
}
```
