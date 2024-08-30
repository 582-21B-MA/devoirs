# Devoir 9: Documentation

Concevez les programmes suivants. Assurez-vous de documenter chacune des
fonctions à l'aide des déclarations de type, des *docstring*, et des
tests unitaires.

## Pig latin

Le pig latin est un argot souvent pratiqué par les enfants pour s'amuser
ou pour converser de manière confidentielle. Pour traduire un mot du
français au pig latin, on suit les deux étapes suivantes : D'abord, si
le mot commence avec une ou plusieurs consonnes, on déplace celles-ci à
la fin du mot. Ensuite, on ajoute « ay » la fin du mot. Ainsi, « banane
» devient « ananebay », « clé » devient « éclay », et « air » devient «
airay ». Concevez un programme qui traduit en pig latin un mot écrit
dans le flux d'entrée. (Bonus : utilisez des fonctions récursives)

## Pangramme

Un pangramme est une phrase qui contient toutes les lettres de
l'alphabet. Par exemple, la phrase suivante est un pangramme : « *The
quick brown fox jumps over the lazy dog* ». Concevez un programme qui
détermine si une phrase écrite dans le flux d'entrée est un pangramme
(sans utiliser les expressions régulières).

## Tic-tac-toe

Concevez un programme qui détermine l'état actuel d'une partie de
tic-tac-toe. Une partie peut être soit « en cours », « égale », ou bien
« remportée » par un des deux joueur·ses. La grille de jeu est transmise
au programme dans le flux d'entrée sous le format `x _ x o _ _ x o o`,
où chaque caractère correspond soit au symbole des joueurs (`x` et `o`),
soit à une case vide (`_`) :

```
 x |   | x
-----------
 o |   |
-----------
 x | o | o
```

L'état actuel de la grille de jeu ci-dessus est « en cours ».
