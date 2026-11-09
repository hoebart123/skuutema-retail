<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Klacht extends Model {
    protected $table = 'klachten';
    protected $primaryKey = 'klacht_id';
    protected $fillable = ['filiaal_id', 'behandeld_door_medewerker', 'klant_naam', 'klant_contact', 'datum_ingediend', 'beschrijving', 'status'];
    public function filiaal() { return $this->belongsTo(Filiaal::class, 'filiaal_id'); }
public function behandelaar() { return $this->belongsTo(Gebruiker::class, 'behandeld_door_medewerker'); }
}
