# Beveiliging en AVG-ontwerp

## Rollen (voorstel)
| Functie | Winkelbeheerder | Klantenservice | Executief |
|---|---|---|---|
| Eigen filiaalvoorraad lezen | Ja | Alleen indien nodig | Geaggregeerd |
| Bestelling plaatsen | Ja | Nee | Nee |
| Klacht behandelen | Nee | Ja | Alleen rapportage |
| Organisatiebrede KPI's | Nee | Nee | Ja |

De opdracht noemt drie rollen, maar specificeert geen exacte permissiematrix. Deze tabel is dus **te valideren**.

## Vereiste maatregelen vóór productie
- Laravel Sanctum/token lifecycle of veilige sessie-authenticatie, MFA waar passend, rate limiting, password resets.
- Policies controleren zowel rol als filiaal. `filiaal_id` uit query/body mag nooit op zichzelf autorisatie verlenen.
- HTTPS, CSRF-bescherming voor browserflows, inputvalidatie, SQL-parameterbinding en security headers.
- Geen demo-credentials in productie; secrets in environment/secret manager; geen `.env` in Git.
- Klantcontactgegevens minimaliseren, bewaartermijnen en verwijderproces vastleggen; logging zonder persoonsgegevens.
- Backups versleutelen, auditlogs voor voorraadmutaties/klachten/statusovergangen, incidentprocedure.
- Dependency-updates, statische analyse, CI en pentest/security review vóór uitrol.

## Bekende risico's in dit startproject
Demo-voorraadendpoint is publiek; seed bevat voorspelbare demo-credentials; geen autorisatie of volledige authflow; geen leverancier-API; geen audittrail. **Niet publiek deployen.**
