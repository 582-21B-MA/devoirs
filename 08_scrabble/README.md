# Exercice 6 : Scrabble

Le Scrabble est un jeu de société où l'objectif est de cumuler des
points en créant des mots dont les lettres valent le plus possible.
Chaque lettre a une valeur prédéfinie :

| Lettre              | Valeur |
| ------------------- | ------ |
| a e i o u l n r s t | 1      |
| d g                 | 2      |
| b c m p             | 3      |
| f h v w y           | 4      |
| k                   | 5      |
| j x                 | 8      |
| q z                 | 10     |

Par exemple, le mot « choux » vaut 17 points puisque la valeur de « c »
est 3, la valeur de « h » est 4, la valeur de « o » est 1, la valeur de
« u » est 1, et la valeur de « x » est 8. Pour calculer le total de
points que vaut un mot, il faut déterminer la valeur de chaque lettre
selon le tableau ci-dessus, puis additionner la valeur des lettres.

Créez un script qui, étant donné une liste de mots, calcule la valeur de
chacun selon les règles ci-dessus, et écrit le total dans le flux de
sortie. Par exemple, étant donné les mots « choux » et « arbre », votre
programme devrait afficher 24.

```sh
php scrabble.php choux arbre
Toal : 24 points
```

La variable prédéfinie `$argv` contient un tableau de tous les arguments
passés au script lorsqu'il est appelé depuis la ligne de commande. Le
premier argument est toujours le nom qui a été utilisé pour exécuter le
script (ci-dessus, `scrabble.php`).
