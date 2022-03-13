Partie 1
--Q1
echo microtime(bool $as_float = false): string|float;

--Q2
intérêt :
Il permet d'améliorer les performances des opérationes SELECT.

principe :
Les entrées d'index agissent comme des pointeurs vers les lignes de la table, 
permettant à la requête de déterminer rapidement quelles lignes correspondent à une condition dans la clause WHERE 
et de récupérer les autres valeurs de colonne pour ces lignes. Tous les types de données MySQL peuvent être indexés.

Partie 2 
--Q1
Décrivez la structure du log de requêtes dans Eloquent.


--Q2
Des problèmes de performance liés à des relations de type parent/enfant. L’anti-pattern que l’on retrouve le plus fréquemment consiste à exécuter une requête pour obtenir la relation parente puis à récupérer les enfants un à un. 