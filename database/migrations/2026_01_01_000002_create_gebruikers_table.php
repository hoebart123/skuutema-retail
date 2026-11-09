<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::create('gebruikers', function (Blueprint $table) {
    $table->id('gebruiker_id'); $table->foreignId('filiaal_id')->nullable()->constrained('filialen', 'filiaal_id')->restrictOnDelete();
    $table->string('voornaam'); $table->string('achternaam'); $table->string('email')->unique();
    $table->string('wachtwoord_hash'); $table->enum('rol', ['winkelbeheerder','klantenservice','executief']);
    $table->rememberToken(); $table->timestamps();
}); }
    public function down(): void { Schema::dropIfExists('gebruikers'); }
};
