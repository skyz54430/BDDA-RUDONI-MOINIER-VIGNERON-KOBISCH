<?php


declare(strict_types=1);
require('../vendor/autoload.php');

header("Access-Control-Allow-Origin: *");

use gamepedia\models\Commentaire;
use gamepedia\models\Compagny;
use gamepedia\models\User;
use Illuminate\Database\Capsule\Manager as DB;
use gamepedia\models\AddConf;
use gamepedia\models\Game;
use gamepedia\models\Platform;


$db = new DB();
$db->addConnection(parse_ini_file('../src/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$faker = Faker\Factory::create('fr_FR');

echo "Création des utilisateurs : ";
$tabEm = ['@gmail.com', '@free.fr', '@yahoo.fr', '@outlook.fr', '@orange.fr', '@live.fr'];
/*for ($i = 0; $i < 25000; $i++){
    echo "{$i} \n";
    $us = new User();

    $n = $faker->firstName();
    $p = $faker->lastName();
    $us->nom = $n;
    $us->prénom = $p;
    $us->email = $n . "." . $p . $tabEm[rand(0, count($tabEm) - 1)];

    if (User::where('email', '=', $us->email)->first() != null){
        $us->email = $n . "." . $p . $tabEm[rand(0, count($tabEm) - 1)];


    }
    $us->id = $i;
$us->adresse_detailee = $faker->address();
   $us->numero_tel = $faker->phoneNumber();
    $us->dateNaiss = $faker->date();
    $us->save();
}
$users = User::all();
$games = Game::all();
*/
echo "Création des commentaires : ";

for ($i = 0; $i < 250000; $i++){
    echo "{$i} \n";
    $com = new Commentaire();
    $com->idCommentaire = $i;
    $com->titre = $faker->text();
    $com->contenu = $faker->text();
    $com->dateCreation = $faker->date();
    $com->created_at = $faker->dateTime();
    $us = $users[rand(0, count($users, COUNT_NORMAL) - 1)];
    $com->emailUser = $us->email;
    $com->idUser = $us->id;
    $com->idJeu = $games[rand(0, count($games, COUNT_NORMAL) - 1)]->id;

    $com->save();

}