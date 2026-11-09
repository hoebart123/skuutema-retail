# Overdracht aan volgende ontwikkelaar

## Eerste 30 minuten
1. Lees `README.md` en `docs/technisch-ontwerp.md`.
2. Installeer Composer dependencies, kopieer `.env.example`, stel MySQL in.
3. Draai `php artisan key:generate`, `php artisan migrate --seed`, `php artisan serve`.
4. Test `/api/status` en de barcode-demo.
5. Bekijk `docs/database-ontwerp.md`, `docs/api-ontwerp.md` en `.github/ISSUES.md`.

## Wat werkt al?
Laravel-startstructuur, migrations, Eloquent-relaties, demo-seeder, statische startpagina en 2 read endpoints. Geen volledige productieflow.

## Eerstvolgende werk
1. Verifieer met Composer en MySQL in een lokale ontwikkelomgeving (niet uitgevoerd bij packaging).
2. Voeg login en rol/filiaalautorisatie toe voordat gegevens extern toegankelijk zijn.
3. Schrijf transactiegedreven bestelservice en tests.
4. Werk cutoff-tijden, distributorkoppeling en leveringsregels uit met stakeholders.
5. Ontwerp ontbrekende gegevens voor verkoop/winst/KPI's.

## Bekende onzekerheden
Zie `README.md`, `docs/database-ontwerp.md` en `docs/technisch-ontwerp.md`. De keuzes zijn voorstellen, niet automatisch goedgekeurde requirements.
