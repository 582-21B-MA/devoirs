CREATE TABLE Pokemon (
    nom TEXT,
    numero INTEGER PRIMARY KEY
);

CREATE TABLE Evolutions (
    base_numero INTEGER REFERENCES Pokemon,
    evo_numero INTEGER REFERENCES Pokemon,
    pierre TEXT,
    niveau INTEGER,

    PRIMARY KEY (base_numero, evo_numero)
);

CREATE TABLE Attaques (
    nom TEXT PRIMARY KEY
);

CREATE TABLE PokemonAttaques (
    attaque_nom TEXT REFERENCES Attaques,
    pokemon_num INTEGER REFERENCES Pokemon,

    PRIMARY KEY (attaque_nom, pokemon_num)
);

