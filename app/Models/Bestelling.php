<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Bestelling extends Model {
    protected $table = 'bestellingen';
    protected $primaryKey = 'bestelling_id';
    protected $fillable = ['filiaal_id', 'gebruiker_id', 'besteldatum', 'verzendmoment', 'status'];
    public function filiaal() { return $this->belongsTo(Filiaal::class, 'filiaal_id'); }
public function gebruiker() { return $this->belongsTo(Gebruiker::class, 'gebruiker_id'); }
public function lijnen() { return $this->hasMany(Bestellingslijn::class, 'bestelling_id'); }
}
