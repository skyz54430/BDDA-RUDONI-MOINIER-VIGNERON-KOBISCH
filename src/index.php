<?php

use gamepedia\db\Eloquent;
use gamepedia\models\{Jeu, Compagnie, Plateforme};

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

Eloquent::start(__DIR__ . DIRECTORY_SEPARATOR . 'conf' . DIRECTORY_SEPARATOR . 'conf.ini');

//Q1 : lister les jeux dont le nom contient 'Mario'
print_r("Q1 : \n");
$gamesMario = Jeu::where('name', 'LIKE', '%Mario%')->get();
foreach ($gamesMario as $game) {
    print_r("\t" . $game->name . "\n");
}

//Q2 : lister les compagnies installées au Japon
print_r("Q2 : \n");
$japanCompany = Compagnie::where('location_country', 'LIKE', 'Japan')->get();
foreach ($japanCompany as $jc) {
    print_r("\t" . $jc->name . "\n");
}

//Q3 : lister les plateformes dont la base installée est >= 10 000 000
print_r("Q3 : \n");
$installBasePlat = Plateforme::where('install_base', '>=', '10000000')->get();
foreach ($installBasePlat as $plat) {
    print_r("\t" . $plat->name . "\n");
}

//Q4 : lister 442 jeux à partir du 21173ème
print_r("Q4 : \n");
$gamesMario = Jeu::where('id', '>', '21173')->limit(442)->get();
foreach ($gamesMario as $game) {
    print_r("\t" . $game->id . " : " . $game->name . "\n");
}

/*//Q5 : lister les jeux, afficher leur nom et deck, en paginant (taille des pages : 500)
print_r("Q5 : \n\n");
try {
    $page = readline("Quelle page souhaitez-vous ?");
    $allGames = Jeu::where('id', '>', 500 * ($page - 1))->limit(500);
    foreach ($allGames as $game) {
        print_r("\t" . $game->id . " : " . $game->name . " " . $game->deck . "\n");
    }
}catch (Throwable $e) {
    print_r("\t ERREUR \n");
}*/



//Q1 : • afficher (name , deck) les personnages du jeu 12342
print_r("Q1 : \n\n");
$jeu = Jeu::find(12342);
foreach ($jeu->hasCharacters as $c){
    echo $c->name . ", " . $c->deck . " \n";
}

//Q2 : • les personnages des jeux dont le nom (du jeu) débute par 'Mario'
print_r("Q2 : \n\n");
$jeux = Game::where('name', 'like', '%mario%')->get();
foreach ($jeux as $j){
    echo $j->name . " : \n";
    foreach ($j->hasCharacters as $c){
        echo $c->id . ", "  . $c->name . " \n";
    }
}

//Q3 : • les jeux développés par une compagnie dont le nom contient 'Sony'
print_r("Q3 : \n\n");
$jeux = Game::whereHas('compagniesDevelopers', function ($q){
    $q->where('name', 'like', '%sony%');})->get();


foreach ($jeux as $j) {

    echo $j->id . ", " . $j->name . "\n";

}

//Q4 : • le rating initial (indiquer le rating board) des jeux dont le nom contient Mario
print_r("Q4 : \n\n");
$ratings = Game_rating::whereHas('original_game_ratings', function ($q) {
    $q->where('name', 'like', '%mario%');})->get();

foreach ($ratings as $r) {
    $ratingBoard = $r->game_ratingTorating_board;
    echo $ratingBoard-> id . " ," . $ratingBoard->name . " , " . $r->id . ", " . $r->name . "\n";

}

//Q5 : • les jeux dont le nom débute par Mario et ayant plus de 3 personnages
print_r("Q5 : \n\n");
$jeux = Game::where('name', 'like', '%mario%')->get();
foreach ($jeux as $j){
    $countChar = $j->hasCharacters()->count();
    if ($countChar > 3) {
        echo $j->id . ", " . $j->name . "\n";
    }
}

//Q6 : • les jeux dont le nom débute par Mario et dont le rating initial contient "3+"
print_r("Q6 : \n\n");
$jeux = Game::where('name', 'like', 'Mario%')->whereHas('gameRating', function($q){
    $q->where('name','like','%3+%');
})->get();
foreach ($jeux as $j){
    echo $j->name . "\n";
}

//Q7 : • les jeux dont le nom débute par Mario, publiés par une compagnie dont le nom contient "Inc." et dont le rating initial contient "3+"
print_r("Q7 : \n\n");
$jeuQ7 = Game::where('name', 'like', 'Mario%')->whereHas('compagniesPublies', function($query) {
    $query->where('name', 'like', '%Inc.%');
    })->whereHas('gameRating', function($q){
    $q->where('name','like','%3+%');
})->get();
foreach ($jeuQ7 as $j7){
    echo $j7->name . "\n";
}


//Q8 : • les jeux dont le nom débute Mario, publiés par une compagnie dont le nom contient "Inc", dont le rating initial contient "3+" et ayant reçu un avis de la part du rating board nommé"CERO"
print_r("Q8 : \n\n");
$jeuQ8 = Game::where('name', 'like', 'Mario%')->whereHas('compagniesPublies', function($query) {
    $query->where('name', 'like', '%Inc.%');
})->whereHas('gameRating', function($q){
    $q->where('name','like','%3+%');
})->whereHas('gameRating.game_ratingTorating_board', function($qu){
    $qu->where('name', 'like', 'CERO');
})->get();
foreach ($jeuQ8 as $j8){
    echo $j8->name . "\n";
}

//Q9 : • ajouter un nouveau genre de jeu, et l'associer aux jeux 12, 56, 12, 345
print_r("Q9 : \n\n");
$nvGenre =new Genre();

$nvGenre->id = Genre::all()->count() + 1;
$nvGenre->name = "Genre perso";
$nvGenre->description = "Nouveau genre cree specialement pas moi eheh";

$jeu1 = Game::find(12);
$jeu1->genres()->save($nvGenre);

$jeu2 = Game::find(56);
$jeu1->genres()->save($nvGenre);

$jeu2 = Game::find(345);
$jeu1->genres()->save($nvGenre);