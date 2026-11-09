<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Filiaal extends Model {
    protected $table = 'filialen';
    protected $primaryKey = 'filiaal_id';
    protected $fillable = ['naam', 'locatie', 'adres', 'postcode', 'stad'];
    public function gebruikers() { return $this->hasMany(Gebruiker::class, 'filiaal_id'); }
public function voorraden() { return $this->hasMany(Voorraad::class, 'filiaal_id'); }
public function bestellingen() { return $this->hasMany(Bestelling::class, 'filiaal_id'); }
public function klachten() { return $this->hasMany(Klacht::class, 'filiaal_id'); }
}
