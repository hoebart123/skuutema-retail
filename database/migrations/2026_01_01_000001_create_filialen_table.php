<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::create('filialen', function (Blueprint $table) {
    $table->id('filiaal_id'); $table->string('naam'); $table->string('locatie')->nullable();
    $table->string('adres'); $table->string('postcode', 16); $table->string('stad'); $table->timestamps();
}); }
    public function down(): void { Schema::dropIfExists('filialen'); }
};
