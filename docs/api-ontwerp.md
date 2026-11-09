# API-ontwerp (concept)

Base path: `/api`. JSON; statuscodes 200/201/400/401/403/404/422/500.

| Methode | Endpoint | Doel | Status |
|---|---|---|---|
| GET | `/api/status` | Health/demo | geïmplementeerd |
| GET | `/api/voorraad/barcode/{barcode}?filiaal_id=1` | Voorraad na barcode-scan | demo, onbeveiligd |
| POST | `/api/login` | Authenticatie | gepland |
| GET | `/api/filialen/{id}/voorraad` | Voorraadlijst | gepland |
| POST | `/api/bestellingen` | Conceptbestelling met lijnen | gepland, route uitgeschakeld |
| POST | `/api/bestellingen/{id}/indienen` | Bestelling vastzetten | gepland |
| GET/POST/PATCH | `/api/klachten` | Klachten beheren | gepland |
| GET | `/api/rapportages/voorraad` | Voorraad-KPI | gepland |

Voorbeeld POST-bestelling (nog niet geïmplementeerd):
```json
{"filiaal_id":1,"regels":[{"product_id":1,"aantal":24}]}
```
Validatievoorstel: filiaal bestaat en is toegankelijk voor medewerker; regels niet leeg; product bestaat; aantal integer >= 1; transactioneel opslaan; voorkom dubbel indienen via idempotency key. Authenticatie en roltoegang zijn verplicht voordat endpoints publiek beschikbaar worden gemaakt.

**Let op:** huidig demo-GET-endpoint onthult voorraadinformatie zonder authenticatie. Alleen gebruiken in afgesloten lokale ontwikkelomgeving.
