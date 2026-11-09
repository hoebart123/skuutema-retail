<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::create('bestellingen', function (Blueprint $table) {
    $table->id('bestelling_id'); $table->foreignId('filiaal_id')->constrained('filialen', 'filiaal_id')->restrictOnDelete();
    $table->foreignId('gebruiker_id')->constrained('gebruikers', 'gebruiker_id')->restrictOnDelete();
    $table->dateTime('besteldatum'); $table->time('verzendmoment')->nullable();
    $table->enum('status', ['concept','ingepland','verzonden','geleverd','geannuleerd'])->default('concept');
    $table->timestamps();
}); }
    public function down(): void { Schema::dropIfExists('bestellingen'); }
};
