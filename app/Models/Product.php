<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model {
    protected $table = 'producten';
    protected $primaryKey = 'product_id';
    protected $fillable = ['naam', 'prijs', 'afbeelding_url', 'productnummer', 'barcode', 'beschrijving'];
    protected function casts(): array { return ['prijs' => 'decimal:2']; }
public function voorraden() { return $this->hasMany(Voorraad::class, 'product_id'); }
public function bestellingslijnen() { return $this->hasMany(Bestellingslijn::class, 'product_id'); }
}
