<?php
namespace Database\Seeders;
use App\Models\{Filiaal,Gebruiker,Product,Voorraad,Bestelling,Bestellingslijn,Klacht};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder {
    public function run(): void {
        $filiaal = Filiaal::create(['naam'=>'Skuutema Centrum','locatie'=>'Centrum','adres'=>'Voorbeeldstraat 1','postcode'=>'1234 AB','stad'=>'Voorbeeldstad']);
        $manager = Gebruiker::create(['filiaal_id'=>$filiaal->filiaal_id,'voornaam'=>'Demo','achternaam'=>'Beheerder','email'=>'beheerder@example.test','wachtwoord_hash'=>Hash::make('Demo12345!'),'rol'=>'winkelbeheerder']);
        $service = Gebruiker::create(['filiaal_id'=>$filiaal->filiaal_id,'voornaam'=>'Demo','achternaam'=>'Service','email'=>'service@example.test','wachtwoord_hash'=>Hash::make('Demo12345!'),'rol'=>'klantenservice']);
        $product = Product::create(['naam'=>'Havermout 500g','prijs'=>1.99,'productnummer'=>'SKU-001','barcode'=>'8712345678901','beschrijving'=>'Fictief testproduct']);
        Voorraad::create(['filiaal_id'=>$filiaal->filiaal_id,'product_id'=>$product->product_id,'aantal'=>8,'minimum_voorraad'=>10,'status'=>'laag']);
        $bestelling = Bestelling::create(['filiaal_id'=>$filiaal->filiaal_id,'gebruiker_id'=>$manager->gebruiker_id,'besteldatum'=>now(),'verzendmoment'=>null,'status'=>'concept']);
        Bestellingslijn::create(['bestelling_id'=>$bestelling->bestelling_id,'product_id'=>$product->product_id,'aantal'=>24]);
        Klacht::create(['filiaal_id'=>$filiaal->filiaal_id,'behandeld_door_medewerker'=>$service->gebruiker_id,'klant_naam'=>'Testklant','klant_contact'=>'testklant@example.test','datum_ingediend'=>now(),'beschrijving'=>'Fictieve klacht voor ontwikkelomgeving.','status'=>'nieuw']);
    }
}
