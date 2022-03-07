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

//Q5 : lister les jeux, afficher leur nom et deck, en paginant (taille des pages : 500)
print_r("Q5 : \n\n");
try {
    $page = readline("Quelle page souhaitez-vous ?");
    $allGames = Jeu::where('id', '>', 500 * ($page - 1))->limit(500);
    foreach ($allGames as $game) {
        print_r("\t" . $game->id . " : " . $game->name . " " . $game->deck . "\n");
    }
}catch (Throwable $e) {
    print_r("\t ERREUR \n");
}