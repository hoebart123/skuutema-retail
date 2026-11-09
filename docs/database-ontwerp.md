# Databaseontwerp (ERD -> Laravel)

## Entiteiten en relaties
| Tabel | Primary key | Belangrijkste foreign keys | Relatie |
|---|---|---|---|
| filialen | filiaal_id | - | 1:N gebruikers, voorraden, bestellingen, klachten |
| gebruikers | gebruiker_id | filiaal_id (nullable) | N:1 filiaal; 1:N bestellingen; 1:N behandelde klachten |
| producten | product_id | - | 1:N voorraden, bestellingslijnen |
| voorraden | voorraad_id | filiaal_id, product_id | uniek (filiaal_id, product_id) |
| bestellingen | bestelling_id | filiaal_id, gebruiker_id | 1:N bestellingslijnen |
| bestellingslijnen | bestellingslijn_id | bestelling_id, product_id | uniek (bestelling_id, product_id) |
| klachten | klacht_id | filiaal_id, behandeld_door_medewerker (nullable) | N:1 filiaal, N:0..1 behandelaar |

## Datatypen en validatie
- IDs: unsigned BIGINT (Laravel `id`, `foreignId`).
- Productprijs: DECIMAL(10,2), nooit float voor geld. Productnummer/barcode: string met unieke index; leidende nullen blijven intact.
- Voorraad- en bestelaantallen: unsigned integer. **Applicatievalidatie vereist >0 voor bestellingslijnen**.
- `besteldatum`, `datum_ingediend`: datetime; `verzendmoment`: time (12:00 of 18:00, ontwerpaanname).
- `wachtwoord_hash`: gehashte waarde (Laravel Hash), nooit plaintext.
- `klant_contact`: vrij tekstveld conform ERD; formaat/privacybeleid nog vaststellen.
- `status` velden: enumeraties als eerste voorstel; aanpassingen vereisen migrations.
- `filiaal_id` bij gebruikers is nullable als aanname voor organisatiebreed management; alle overige filialenrelaties verplicht.

## Constraints
- Foreign keys verhinderen verwijderen van gekoppelde filialen, producten en gebruikers (`restrictOnDelete`), behalve bestellingslijnen die met hun bestelling worden verwijderd.
- Behandelaar van klacht mag bij verwijderen op null worden gezet.
- Unieke voorraad per filiaal/product en unieke productregel per bestelling.
- Voorraadaantal mag niet negatief worden; wijzigingen via transactionele service en zo nodig row locks.

## Afwijkingen / ontbrekende ERD-informatie
- `GEBRUIKER` staat dubbel in de afbeelding: dezelfde tabel, niet twee tabellen.
- Toegevoegd: `created_at`, `updated_at` voor auditbaarheid; `remember_token` als Laravel-auth-ondersteuning; `personal_access_tokens` voor toekomstige Sanctum-tokens.
- Geen entiteiten voor leveranciers, leveringen, verkopen, aanbiedingen, personeelplanning, KPI's of kosten. Deze functies zijn in opdracht genoemd maar niet in ERD uitgewerkt.
- Geen expliciete unieke constraints of verplichte velden in de afbeelding: keuzes hierboven zijn ontwerpvoorstellen.

## Migratievolgorde
filialen -> gebruikers -> producten -> voorraden -> bestellingen -> bestellingslijnen -> klachten -> personal_access_tokens. `php artisan migrate` volgt bestandsvolgorde.
