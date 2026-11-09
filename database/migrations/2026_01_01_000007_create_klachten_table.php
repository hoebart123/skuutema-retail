<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::create('klachten', function (Blueprint $table) {
    $table->id('klacht_id'); $table->foreignId('filiaal_id')->constrained('filialen', 'filiaal_id')->restrictOnDelete();
    $table->foreignId('behandeld_door_medewerker')->nullable()->constrained('gebruikers', 'gebruiker_id')->nullOnDelete();
    $table->string('klant_naam'); $table->string('klant_contact'); $table->dateTime('datum_ingediend');
    $table->text('beschrijving'); $table->enum('status', ['nieuw','in_behandeling','afgehandeld'])->default('nieuw');
    $table->timestamps();
}); }
    public function down(): void { Schema::dropIfExists('klachten'); }
};
