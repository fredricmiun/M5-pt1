# DT173G - Webbutveckling III

[Mittuniversitetet](https://www.miun.se/ "Mittuniversitetets Hemsida")

### Moment 5 - Steg 1

REST-API

Källkod för anslutning till databas, samt REST API för CRUD-hantering. 

Länk till projektet: http://studenter.miun.se/~frfr1800/DT173G/M5/

Kort sammanfattning över hur min lösning ser ut:

Först har jag skapat en anslutning till databasen med pdo. Detta för att det gör datahanteringen säkrare. En klass har skapats med publika metoder för att hämta, skapa, ta bort och redigera den tillgängliga informationen med pdo-connection. Data som hämtas från databasen placeras i en array->json_encode som sedan returneras och kan hämtas av fetch api.

Switch-funktion har använts för att särskilja fetch api's mening med anropet.
