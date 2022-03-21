<?php
declare(strict_types=1);
require('vendor/autoload.php');

header("Access-Control-Allow-Origin: *");

use gamepedia\models\Character;
use gamepedia\models\Company;
use gamepedia\models\Game_rating;
use gamepedia\models\Genre;
use vendor\illuminate\database\Capsule\Manager as DB;
use gamepedia\models\AddConf;
use gamepedia\models\Game;
use gamepedia\models\Platform;

$db = new DB();

$db->addConnection( parse_ini_file('../src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();
DB::connection()->enableQueryLog();
//Liste des jeux dont le nom contient Mario :
echo "Liste des jeux dont le nom contient Mario : \n\n";
$jeux = Game::where('name', 'like', '%Mario%')->get();
foreach ($jeux as $j) {
    echo "Nom : {$j->name} \n";
}
echo "\n";
//Noms des personnages du jeu 12342 :
echo "Noms des personnages du jeu 12342 : \n\n";
$jeu = Game::find(12342);
foreach ($jeu->hasCharacters as $c){
    echo $c->name . " \n";
}
echo "\n";

//Personnages qui sont apparus pour la première fois dans un jeu dont le nom contient mario
echo "Personnages qui sont apparus pour la première fois dans un jeu dont le nom contient mario : \n\n";
$persos = Character::whereHas('firstAppearsIn', function ($q){
    $q->where('name','like','%Mario%');
})->get();

foreach ($persos as $p) {
    echo "{$p->name} \n";
}



//Personnages qui sont apparus pour la première fois dans un jeu dont le nom contient mario
echo "Personnages qui sont apparus pour la première fois dans un jeu dont le nom contient mario avec chargement lié: \n\n";
$persos = Character::whereHas('firstAppearsIn', function ($q){
    $q->where('name','like','%Mario%');
})->get();

foreach ($persos as $p) {
    echo "{$p->name} \n";
}





//Les personnages dont le nom du jeu contient 'Mario'
echo "Les personnages dont le nom du jeu contient Mario : \n\n";
$jeux = Game::where('name', 'like', '%Mario%')->get();
foreach ($jeux as $j){
    echo $j -> name . " :\n";
    foreach ($j->hasCharacters as $c){
        echo "\t" . $c->name . "\n";
    }
}

//Les personnages dont le nom du jeu contient 'Mario' avec chargement lié
echo "Les personnages dont le nom du jeu contient 'Mario' avec chargement lié : \n\n";
$jeux = Game::where('name', 'like', '%Mario%')->with('hasCharacters')->get();
foreach ($jeux as $j){
    echo $j -> name . " :\n";
    foreach ($j->hasCharacters as $c){
        echo "\t" . $c->name . "\n";
    }
}

echo "\n";

//Les jeux développés par une compagnie dont le nom contient 'Sony'
echo "Les jeux développés par une compagnie dont le nom contient 'Sony' \n\n";

$compagnies = Company::where('name', 'like', '%Sony%')->get();
foreach ($compagnies as $c){
    echo "{$c->name} : \n";
    foreach ($c->jeuxDevs as $j){
        echo "\t{$j->name} \n";
    }
}


echo "\n";


echo "Les jeux développées par une compagnie dont le nom contient 'Sony' avec chargement lié : \n\n";
$compagnies = Company::where('name', 'like', '%Sony%')->with('jeuxDevs')->get();
foreach ($compagnies as $c){
    echo "{$c->name} : \n";
    foreach ($c->jeuxDevs as $j){
        echo "\t{$j->name} \n";
    }
}


$compteurQuery = 0;
foreach( DB::getQueryLog() as $q){
    echo "-------------- \n";
    echo "query : " . $q['query'] ."\n";
    echo " --- bindings : [ ";
    foreach ($q['bindings'] as $b ) {
        echo " ". $b."," ;
    }
    echo " ] ---\n";
    echo "-------------- \n \n";
    $compteurQuery++;
};

echo "Nombre de requetes exécutées : {$compteurQuery} !";