CREATE TABLE Etudiants (
    nom TEXT,
    numero INTEGER PRIMARY KEY,
    projet_titre TEXT NOT NULL REFERENCES Projets,
    enseignant_numero INTEGER NOT NULL REFERENCES Enseignants
);

CREATE TABLE Projets (
    titre TEXT PRIMARY KEY
);

CREATE TABLE Enseignants (
    numero INTEGER PRIMARY KEY,
    nom TEXT
);
