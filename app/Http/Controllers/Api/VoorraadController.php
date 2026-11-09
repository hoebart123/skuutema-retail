<?php
namespace App\Http\Controllers\Api;
use App\Models\Voorraad;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class VoorraadController {
    public function zoekOpBarcode(Request $request, string $barcode): JsonResponse {
        // Demo-only: filter op filiaal; vervang met filiaalautorisatie voordat dit publiek wordt.
        $data = $request->validate(['filiaal_id' => ['required','integer','exists:filialen,filiaal_id']]);
        $voorraad = Voorraad::query()->with('product:product_id,naam,barcode,prijs')
            ->where('filiaal_id', $data['filiaal_id'])->whereHas('product', fn ($q) => $q->where('barcode', $barcode))->first();
        if (!$voorraad) return response()->json(['message' => 'Geen voorraad gevonden'], 404);
        return response()->json(['voorraad_id' => $voorraad->voorraad_id, 'filiaal_id' => $voorraad->filiaal_id,
            'aantal' => $voorraad->aantal, 'minimum_voorraad' => $voorraad->minimum_voorraad,
            'status' => $voorraad->status, 'product' => $voorraad->product]);
    }
}
