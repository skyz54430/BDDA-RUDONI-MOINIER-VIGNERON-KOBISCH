# BDDA-RUDONI-MOINIER-VIGNERON-KOBISCH
.
# Etudier de la même manière la requête : lister les jeux dont le nom contient '<valeur>'. Pouvezvous expliquer le résultat ?

l'index n'est pas utile, cela prend autant de temps d'éxécution, mais quand nous faisons il recherche 
le temps est plus faible, et l'on voit bien l'utilité de l'index. 

# Etudiez sur le même principe la requête "Liste des compagnies d'un pays(location_country)" :
évaluez le gain de performance amené par un index. Que pensez-vous du résultat ?

Le temps de la requête est divisé par 10, il passe de 0.2 secs à 0.02 secs avec l'index.
mais pour 0.2 secondes, cela n'est pas très utile.

# Afficher le log de requêtes : combien de requêtes sont exécutées ? quelle est la technique SQL utilisée ?

les inner join 

# Faites la même comparaison avec la requête : jeux développés par une compagnie dont le nom contient 'Sony'

Il en est de même pour la question avec les jeux développées par une entreprise dont le nom contient Sony.
