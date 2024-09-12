# Devoir 10 : Routeur

Les fonctions natives `file_put_contents` et `file_get_contents`
permettent respectivement d'écrire une chaîne de caractères donnée dans
un fichier texte, et de lire le contenu d'un fichier dans une chaîne.

```php
<?php

// Crée un fichier letters.txt s'il n'existe pas déjà,
// et sauvegarde le texte « abc » dans celui-ci.
file_put_contents("letters.txt", "abc");

echo file_get_contents("letters.txt"); // => abc
```

Les fonctions natives `json_encode` et `json_decode` permettent
respectivement de convertir un tableau associatif en format JSON, et de
convertir une chaîne JSON en un tableau associatif.

```php
<?php

$student = [ "name" => "Raphael", "age" => 25 ];
$json = json_encode($student);
echo $json; // => { "name": "Raphael", "age": 25 }
json_decode($json, true); // => [ "name" => "Raphael", "age" => 25 ]
```

N'oubliez pas de passer `true` comme deuxième argument lorsque vous
appelez `json_decode`, sinon la valeur de retour sera de type objet (et
nous n'avons pas encore vu les objets en PHP).

## Étape 1

Concevez une fonction qui, étant donnée le titre d'un livre et son année
de publication, sauvegarde celui-ci dans un fichier appelé `books.json`.
Puisque `file_put_contents` écrase le contenu du fichier dans lequel il
écrit, vous devrez d'abord lire le contenu de `books.json`, convertir le
JSON en tableau associatif, ajoutez le nouveau livre au tableau,
reconvertir le tableau en JSON, puis finalement écrire la chaîne JSON
dans le fichier. Pour que le tout fonctionne correctement, vous devrez
créer le fichier manuellement, et écrire dans celui-ci un tableau vide
(`[]`).

Testez votre fonction en appelant le programme à partir de la ligne de
commande. Ainsi, `php index.php add "Le Nez" 1836` devrait ajouter
le livre à la base de données. Assurez-vous de séparer la logique métier
de l'interface.

## Étape 2

Concevez une seconde fonction qui retourne un tableau contenant tous les
livres sauvegardés dans le fichier `books.json` en ordre croissant de
publication (vous pouvez utiliser la fonction native de triage `usort`).
Testez votre fonction en appelant le programme de nouveau à partir de la
ligne de commande. La commande `php index.php books` devrait lister les
livres de la base de données dans le format suivant :

```
1836 Le Nez
1842 Le Manteau
1842 Les Âmes mortes
```

## Étape 3

En utilisant le routeur conçu en classe et les fonctions créées
précédemment, concevez un serveur capable de répondre aux requêtes
suivantes. (Vous pouvez retirer la logique concernant la ligne de
commande.)

### Liste HTML

Une requête dont la méthode est GET et le chemin `/books` devrait
recevoir comme réponse une liste `<dl>` contenant le titre des livres et
leur année de publication (voir la [documentation][dl] pour cet élément
si mal connu, mais si fréquemment pertinent). Exceptionnellement, il
n'est pas nécessaire d'envoyer un document HTML complet. Seule la liste
fera l'affaire.

[dl]: https://developer.mozilla.org/fr/docs/Web/HTML/Element/dl

### API

Une requête dont la méthode est GET et le chemin `/api/books` devrait
recevoir comme réponse les livres en format JSON. N'oubliez pas de
donner la bonne valeur à l'entête `Content-type` selon le type de
contenu retourné.

### Ajouter un livre

Finalement, une requête dont la méthode est POST et le chemin
`/books/add` devrait pouvoir ajouter un livre à la base de données. Le
titre du livre et son année de publication sont envoyés dans le corps de
la requête, encodés en format [x-www-form-urlencoded][] (l'encodage
utilisé par défaut par les formulaires HTML).

[x-www-form-urlencoded]:
    https://developer.mozilla.org/fr/docs/Web/HTTP/Methods/POST

Pour accéder aux données d'une requête POST, vous pouvez utiliser la
variable prédéfinie `$_POST`. Considérons par exemple la requête
produite par la commande suivante :

```sh
curl localhost:4000 -d "title=Le+Nez&year=1836"`
```

Pour extraire le titre, on utilisera `$_POST["title"]`. Pour extraire
l'année, on utilisera `$_POST["year"]` sera `"1836"`.

Une fois le livre ajouté à la base de données, la réponse devrait
rediriger le client vers la page `/books`. Pour se faire, on enverra le
code de statut 303 (*See Other*) au client, et on donnera l'adresse de
redirection comme valeur de l'entête `Location`. Vous pouvez utilisez
l'option `-L` de curl pour tester la redirection.