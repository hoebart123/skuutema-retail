# Technisch ontwerp

## Doel en scope
Ontwerp van een retailplatform voor filiaalbeheerders, klantenservice en executief management. De bronopdracht vraagt realtime voorraad-/winkelinformatie, mobiel barcodescannen, bestellen, klachtenafhandeling en managementrapportages. Dit startproject levert een databasebasis en demo-read-API; de volledige functies zijn backlog.

## Gekozen architectuur (ontwerpvoorstel)
- **Laravel 12 / PHP** als monolithische backend met HTTP API.
- **MySQL 8** voor relationele data, Eloquent ORM en versioned migrations.
- **Webdashboard** (later Blade of SPA) voor medewerkers; **mobiele client** (later) scant barcodes en roept API aan.
- **Scheduler + queue** (later) voor twee verzendmomenten per dag en betrouwbare leverancierintegratie.
- **Sanctum** als mogelijke token-authenticatie voor de mobiele client; autorisatie via policies/middleware (nog niet gebouwd).
- Scheiding in controllers, services, jobs, policies en modellen voor toekomstige ontwikkeling.

## Functionele processen
1. **Voorraad raadplegen:** medewerker scant barcode -> API zoekt product -> filtert voorraad op filiaal -> retourneert aantal/minimum/status.
2. **Bestellijst opbouwen:** geautoriseerde winkelbeheerder kiest product en aantal -> conceptbestelling met lijnen -> server valideert aantallen en filiaal.
3. **Verzending:** op 12:00 en 18:00 lokale bedrijfstijd worden ingeroosterde bestellingen gegroepeerd en veilig naar distributeur verzonden. Bronopdracht: levering altijd volgende dag; vóór 12:00 besteld betekent vóór 10:00 volgende dag. Preciese grenzen bij 12:00/18:00 en orderwijzigingen zijn nog te specificeren.
4. **Klachten:** klantenservice registreert klantnaam/contact en beschrijving, wijst behandelaar toe en past status aan.
5. **Management:** rapportage over verkoop, winstgevendheid, KPI's en voorraad. **Verkoop-/kostprijsgegevens ontbreken in ERD**, dus financiële dashboards vereisen uitbreiding.

## Niet-functionele eisen (voorstel, te valideren)
- HTTPS, least privilege, logging zonder persoonsgegevens, versleutelde secrets.
- Transacties bij bestellingcreatie; unieke sleutel op (filiaal, product) in voorraad en (bestelling, product) in lijnen.
- Beschikbaarheid en performance worden met stakeholders gekwantificeerd; geen ongefundeerde SLA's.
- Backups, monitoring, migratiebeleid, CI en tests voor productie.

## Componenten
Zie `architectuur.mmd` voor een Mermaid-overzicht. Externe leverancier is een toekomstige integratie, niet aanwezig in code.

## Ontwerpbesluiten
- Een `GEBRUIKER`-tabel ondanks dubbele weergave in ERD.
- Primary keys expliciet met Nederlandse kolomnamen; Laravel-modellen configureren `$primaryKey`.
- Klacht heeft optionele behandelaar voor nog niet toegewezen meldingen.
- Voorraadstatus wordt momenteel opgeslagen conform ERD, maar moet bij mutaties consequent opnieuw worden berekend; alternatief is afgeleide status.
- Bestellingstatus en rolwaarden zijn ontwerpkeuzes, niet volledig gespecificeerd in bron.

## Open vragen
Welke filialen mogen executives beheren? Hoe wordt orderverzending bij exact 12:00 behandeld? Welke distributeur-API bestaat? Hoe verwerken we retouren/leveringen? Welke KPI-definities gelden? Hoe worden klantcontactgegevens bewaard/verwijderd? Zijn aanbiedingen, personeelroosters en verkooptransacties onderdeel van fase 1?
