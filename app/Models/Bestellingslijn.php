<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Bestellingslijn extends Model {
    protected $table = 'bestellingslijnen';
    protected $primaryKey = 'bestellingslijn_id';
    protected $fillable = ['bestelling_id', 'product_id', 'aantal'];
    public function bestelling() { return $this->belongsTo(Bestelling::class, 'bestelling_id'); }
public function product() { return $this->belongsTo(Product::class, 'product_id'); }
}
