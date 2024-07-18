CREATE TABLE Clients (
    num_client INTEGER PRIMARY KEY,
    nom TEXT
);

CREATE TABLE Animaux (
    nom TEXT,
    date_naissance INTEGER,
    poids FLOAT,
    num_client INTEGER NOT NULL REFERENCES Clients,
    
    PRIMARY KEY (nom, num_client)
);

CREATE TABLE RendezVous (
    diagnostique TEXT,
    date INTEGER,
    animal_nom TEXT NOT NULL,
    num_client INTEGER NOT NULL,

    PRIMARY KEY (date, animal_nom, num_client),
    FOREIGN KEY (animal_nom, num_client) REFERENCES Animaux (nom, num_client)
);

CREATE TABLE Symptomes (
    nom TEXT PRIMARY KEY
);

CREATE TABLE RendezVousSymptomes (
    nom_symptome TEXT REFERENCES Symptomes,
    date INTEGER,
    animal_nom TEXT,
    num_client INTEGER,
    
    PRIMARY KEY (nom_symptome, date, animal_nom, num_client),
    FOREIGN KEY (date, animal_nom, num_client) REFERENCES RendezVous
);
