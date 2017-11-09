-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Käyttäjä(
  id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
  käyttäjätunnus varchar(100) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
  salasana varchar(100) NOT NULL
);

CREATE TABLE Drinkki(
  id SERIAL PRIMARY KEY,
  käyttäjä_id INTEGER REFERENCES Käyttäjä(id),
  nimi varchar(100) NOT NULL,
  tyyppi varchar(100),
  ainesosat varchar(500)
);