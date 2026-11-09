<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
class Gebruiker extends Authenticatable {
    use HasApiTokens;
protected $table = 'gebruikers';
    protected $primaryKey = 'gebruiker_id';
    protected $fillable = ['filiaal_id', 'voornaam', 'achternaam', 'email', 'wachtwoord_hash', 'rol'];
    protected $hidden = ['wachtwoord_hash', 'remember_token'];
protected function casts(): array { return ['wachtwoord_hash' => 'hashed']; }
public function filiaal() { return $this->belongsTo(Filiaal::class, 'filiaal_id'); }
public function bestellingen() { return $this->hasMany(Bestelling::class, 'gebruiker_id'); }
public function behandeldeKlachten() { return $this->hasMany(Klacht::class, 'behandeld_door_medewerker'); }
public function getAuthPassword() { return $this->wachtwoord_hash; }
}
