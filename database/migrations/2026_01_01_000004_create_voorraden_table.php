<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::create('voorraden', function (Blueprint $table) {
    $table->id('voorraad_id'); $table->foreignId('filiaal_id')->constrained('filialen', 'filiaal_id')->restrictOnDelete();
    $table->foreignId('product_id')->constrained('producten', 'product_id')->restrictOnDelete();
    $table->unsignedInteger('aantal')->default(0); $table->unsignedInteger('minimum_voorraad')->default(0);
    $table->enum('status', ['voldoende','laag','uitverkocht'])->default('uitverkocht');
    $table->unique(['filiaal_id','product_id']); $table->timestamps();
}); }
    public function down(): void { Schema::dropIfExists('voorraden'); }
};
