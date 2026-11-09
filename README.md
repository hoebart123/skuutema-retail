# Skuutema Retail | Laravel-startproject

Technische overdracht voor het fictieve retailbeheerplatform. **Status: startproject / proof of concept, niet productieklaar.**

## Inhoud
- Laravel 12 applicatieskelet (broncode, zonder `vendor/`)
- 7 Eloquent-modellen en 7 bijbehorende migrations (+ Sanctum-token-tabel)
- Voorbeeldseeder, eenvoudige webpagina, statusendpoint en demo-voorraadlookup
- Technische ontwerpen, ERD-documentatie, sprintplanning en GitHub-issues
- GitHub Actions workflow voor PHP-tests

## Vereisten
PHP >= 8.2 met extensions mbstring, openssl, pdo_mysql, tokenizer, xml, ctype, fileinfo; Composer 2; MySQL 8+; Git. Voor tests: pdo_sqlite. Het ZIP-bestand bevat **geen dependencies en geen composer.lock**; installeer die lokaal.

## Installatie
```bash
git clone <jouw-repository-url>
cd skuutema-retail
composer install
cp .env.example .env
php artisan key:generate
```
Maak in MySQL de database en gebruiker aan, bijvoorbeeld:
```sql
CREATE DATABASE skuutema_retail CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'skuutema'@'localhost' IDENTIFIED BY 'kies-een-sterk-wachtwoord';
GRANT ALL PRIVILEGES ON skuutema_retail.* TO 'skuutema'@'localhost';
```
Werk `.env` bij met je eigen MySQL-gegevens. Daarna:
```bash
php artisan migrate --seed
php artisan serve
```
Open `http://127.0.0.1:8000` en `http://127.0.0.1:8000/api/status`.

## Demo API
```bash
curl 'http://127.0.0.1:8000/api/voor,raad/barcode/8712345678901?filiaal_id=1'
```
**Let op:** deze voorraadlookup is demonstratief en **niet geauthenticeerd**. Niet publiek deployen. De POST-bestellingroute is bewust uitgeschakeld tot autorisatie en transactieafhandeling gereed zijn.

## Testen
```bash
php artisan test
php artisan migrate:fresh --seed  # VERWIJDERT bestaande data; alleen lokaal!
```

## Seeddata
Fictief filiaal, twee demo-gebruikers, één product, voorraad, conceptbestelling en klacht. Demo-wachtwoord: `Demo12345!` (alleen lokaal; er is nog geen loginflow).

## Architectuur en scope
Zie `docs/technisch-ontwerp.md`, `docs/database-ontwerp.md`, `docs/api-ontwerp.md`, `docs/beveiliging.md`, `docs/sprint-planning.md`, `docs/overdracht.md` en `docs/architectuur.mmd`.


## Aannames / nog te beslissen
De ERD bevat `GEBRUIKER` tweemaal (één entiteit geïmplementeerd). Een gebruiker mag `filiaal_id = null` hebben voor organisatiebreed management; dit is een ontwerpaanname. `verzendmoment` is voorlopig `TIME` en wordt pas bij verzending gevuld. De precieze afhandeling van cutoff-tijden, tijdzones, voorraadstatus en leverancierkoppeling moet door stakeholders worden bevestigd. Er ontbreken brongegevens voor leveranciers, verkopen, KPI's en leveringen: deze zijn **niet** verzonnen of gemodelleerd als bestaande ERD-entiteiten.

## Beperkingen
Niet getest met geïnstalleerde Laravel-dependencies in de bouwomgeving. Er is alleen PHP-syntaxcontrole uitgevoerd. Geen echte authenticatie, rolmiddleware, scannerinterface, automatische verzending, rapportages of leverancierintegratie.
