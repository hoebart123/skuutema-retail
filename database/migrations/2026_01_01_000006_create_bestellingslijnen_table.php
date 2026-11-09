<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::create('bestellingslijnen', function (Blueprint $table) {
    $table->id('bestellingslijn_id'); $table->foreignId('bestelling_id')->constrained('bestellingen', 'bestelling_id')->cascadeOnDelete();
    $table->foreignId('product_id')->constrained('producten', 'product_id')->restrictOnDelete();
    $table->unsignedInteger('aantal'); $table->unique(['bestelling_id','product_id']); $table->timestamps();
}); }
    public function down(): void { Schema::dropIfExists('bestellingslijnen'); }
};
