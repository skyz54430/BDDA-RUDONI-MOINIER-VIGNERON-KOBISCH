<?php


declare(strict_types=1);
require('../vendor/autoload.php');

header("Access-Control-Allow-Origin: *");

use gamepediagamepedia\models\Compagny;
use gamepedia\models\User;
use Illuminate\Database\Capsule\Manager as DB;
use gamepedia\models\AddConf;
use gamepedia\models\Game;
use gamepedia\models\Platform;

$db = new DB();
$db->addConnection(parse_ini_file('../src/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();

echo "Commentaires de l'utilisateur 5 : \n\n";
$coms = User::find(5)->commentaires()->orderBy('created_at', 'DESC')->get();
foreach ($coms as $c){
    echo $c->dateCreation . ", " . $c->titre . "\n";
}

//2
/*
users = User::whereHas('commentaires', function ($q){
$q->where('count', '>', '5');
})->get();
foreach ($users as $u){
    echo $u->email;
}
*/

echo "Utilisateurs qui ont commentés plus de 5 fois : \n\n";
$users = User::has('commentaires', '>', 5)->get();
foreach ($users as $u){
    echo $u->email . "\n";
}