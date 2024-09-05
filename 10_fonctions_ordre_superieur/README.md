# Devoir 10: Les fonction d'ordre supérieur

Concevez les fonctions suivantes. N'oubliez pas leur documentation,
incluant les déclarations de type, le *docstring*, et les tests. 

-   Une fonction `map` qui, étant donné un tableau et une fonction de
    rappel, applique la fonction de rappel sur chaque élément du
    tableau, et retourne le tableau qui en résulte. (Vous ne pouvez pas
    utilisez la fonction native `array_map`.) Par exemple, `map([1, 2,
    3], fn ($n) => $n + 1)` devrait donner `[2, 3, 4]`.

-   Une fonction `filter` qui, étant donné un tableau et une fonction de
    rappel, applique la fonction de rappel sur chaque élément du
    tableau, et retourne un tableau qui contient seulement les éléments
    pour lesquels la valeur de retour de la fonction de rappel est
    `true`. (Vous ne pouvez pas utilisez la fonction native
    `array_filter`.) Par exemple, `filter([1, 2, 3], fn ($n) => $n > 1`
    devrait donner `[2, 3]`.

-   Une fonction `new_account` qui, étant donné une balance initiale,
    retourne un tableau contenant une fonction pour déposer un montant
    d'argent donné, et une autre pour retirer un montant d'argent donné.
    Les deux fonctions doivent retourner la nouvelle balance. Il devrait
    être possible de créer plusieurs comptes parallèles en appelant
    `new_account` plusieurs fois.
