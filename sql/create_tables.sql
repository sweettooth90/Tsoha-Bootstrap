-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Käyttäjä(
  id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
  username varchar(100) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
  password varchar(100) NOT NULL
);

CREATE TABLE Nimi(
  id SERIAL PRIMARY KEY,
  nimi varchar (100) NOT NULL
);

CREATE TABLE Tyyppi(
  id SERIAL PRIMARY KEY,
  tyyppi varchar (100) NOT NULL
);

CREATE TABLE Ainesosat(
  id SERIAL PRIMARY KEY,
  ainesosat varchar (500) NOT NULL
);

CREATE TABLE Drinkki(
  id SERIAL PRIMARY KEY,
  käyttäjä_id INTEGER REFERENCES Käyttäjä(id),
  nimi varchar(100) NOT NULL,
  tyyppi varchar(100),
  ainesosat varchar(500),
  kuvaus varchar(1000)
);