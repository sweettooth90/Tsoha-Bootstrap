-- Lisää INSERT INTO lauseet tähän tiedostoon
-- Käyttäjä-taulun testidata
INSERT INTO Käyttäjä (käyttäjätunnus, salasana) VALUES ('testikayttaja', 'testisalasana'); -- Koska id-sarakkeen tietotyyppi on SERIAL, se asetetaan automaattisesti
-- Drinkki-taulun testidata
INSERT INTO Drinkki (nimi, tyyppi, ainesosat, kuvaus) VALUES ('Jallukola', 'Juomasekoitus', 'Jaloviina, Coca-Cola', 'Maukas');
INSERT INTO Drinkki (nimi, tyyppi, ainesosat, kuvaus) VALUES ('Rommikola', 'Juomasekoitus', 'Rommi, Coca-Cola', 'Toimii');