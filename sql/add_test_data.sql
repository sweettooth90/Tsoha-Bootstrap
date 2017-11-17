-- Lisää INSERT INTO lauseet tähän tiedostoon
-- Käyttäjä-taulun testidata
INSERT INTO Käyttäjä (käyttäjätunnus, salasana) VALUES ('Kalle', 'Kalle123'); -- Koska id-sarakkeen tietotyyppi on SERIAL, se asetetaan automaattisesti
INSERT INTO Käyttäjä (käyttäjätunnus, salasana) VALUES ('Henri', 'Henri123');
-- Drinkki-taulun testidata
INSERT INTO Drinkki (nimi, tyyppi, ainesosat) VALUES ('Jallukola', 'Juomasekoitus', 'Jaloviina, Coca-Cola');
INSERT INTO Drinkki (nimi, tyyppi, ainesosat) VALUES ('Rommikola', 'Juomasekoitus', 'Rommi, Coca-Cola');