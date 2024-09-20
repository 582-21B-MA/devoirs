# Exercice : Interface de base de données

Concevez une application qui, étant donné le nom d'un film et son ou sa
réalisatrice, sauvegarde celui-ci dans une base de données SQLite. 

## Étape 1

Pour utiliser l'application, l'utilisateur·rice doit pouvoir exécuter la
commande suivante dans le terminal.

```sh
php cli.php add "Ohiyo" "Yasujiro Ozu"
```

L'utilisateur·rice doit également pouvoir récupérer tous les films de la
base de données en exécutant la commande ci-dessous dans son terminal.

```sh
php cli.php all
```

Les films devraient être listés en ordre croisant selon leur titre.

N'oubliez pas d'assigner à chaque tâche une fonction distincte. Par
exemple, ajouter un film dans la base de données et extraire tous les
films sont deux tâches différentes. Vous devrez passer à chaque fonction
l'objet qui représente la base de données.

## Étape 2

Une fois que votre application fonctionne sur la ligne de commande,
ajoutez une interface Web de sorte à ce qu'un ou une utilisatrice puisse
insérer et extraire des films dans la base de données à l'aide de
requêtes HTTP. Si vous avez de la difficulté dans vos gestionnaires de
requêtes à accéder à l'objet qui représente la base de données, révisez
les notes concernant les fermetures.
