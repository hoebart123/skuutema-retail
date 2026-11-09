# Sprintplanning / GitHub Projects

**Voorstel:** 2 sprints van 1 week, aan te passen aan team en beschikbare tijd. Prioriteit: technische ontwerpen boven werkende functionaliteit.

## Projectbord
Kolommen: `Backlog` -> `To do` -> `In progress` -> `Review` -> `Done`. Gebruik GitHub Issues met labels `priority:P0`, `priority:P1`, `type:design`, `type:backend`, `type:test`, `type:docs`.

## Sprint 1: overdraagbaar ontwerp (P0)
| Issue | Taak | Acceptatiecriteria |
|---|---|---|
| #1 | ERD controleren en databaseontwerp | 7 tabellen, PK/FK, cardinaliteiten, afwijkingen en aannames gedocumenteerd |
| #2 | Architectuur en API-contract | componentdiagram, endpoints, beveiligingsgrenzen, open vragen |
| #3 | Security- en privacyontwerp | rollenmatrix, AVG-risico's, autorisatieplan |
| #4 | GitHub-repository en takenbord | README, labels, kolommen, issues, branchregels |

## Sprint 2: startcode (P1)
| Issue | Taak | Acceptatiecriteria |
|---|---|---|
| #5 | Laravel bootstrappen + DB-verbinding | composer install, .env, artisan migrate werkt |
| #6 | Migrations + modellen | 7 modellen, relaties, constraints, migraties |
| #7 | Seeders + tests | voorbeelddata en geautomatiseerde smoke tests |
| #8 | API-demo en overdracht | statusendpoint, barcode-lookup, README en beperkingen |

## Definition of Done
Code in PR gereviewd, documentatie bijgewerkt, migrations draaien op lege database, tests groen, geen secrets gecommit, open aannames expliciet vastgelegd. Niet-afgeronde issues blijven zichtbaar op het bord.
