<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::create('producten', function (Blueprint $table) {
    $table->id('product_id'); $table->string('naam'); $table->decimal('prijs', 10, 2);
    $table->string('afbeelding_url')->nullable(); $table->string('productnummer')->unique();
    $table->string('barcode')->unique(); $table->text('beschrijving')->nullable(); $table->timestamps();
}); }
    public function down(): void { Schema::dropIfExists('producten'); }
};
