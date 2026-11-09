<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Voorraad extends Model {
    protected $table = 'voorraden';
    protected $primaryKey = 'voorraad_id';
    protected $fillable = ['filiaal_id', 'product_id', 'aantal', 'minimum_voorraad', 'status'];
    public function filiaal() { return $this->belongsTo(Filiaal::class, 'filiaal_id'); }
public function product() { return $this->belongsTo(Product::class, 'product_id'); }
}
