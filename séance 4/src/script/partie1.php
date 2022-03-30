
<?php

require('../vendor/autoload.php');

header("Access-Control-Allow-Origin: *");

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

echo "Ajout de 2 utilisateurs ! ";
/*
$us1 = new User();
$us1->nom = "syks";
$us1->prénom = "Sav";
$us1->email = "zeeee@gmail.com";
$us1->adresse_detailee = "loin";
$us1->numero_tel = "0708091011";
$us1->save();



$us2 = new User();
$us2->nom = "sess";
$us2->prénom = "aefef";
$us2->email = "azerty@gmail.com";
$us2->adresse_detailee = "loin";
$us2->numero_tel = "0708091174";
$us2->save();
*/


$g = Game::where('id', '=', 150000)->first();
echo $g == null;

echo "Ajouter des commentaires";
$c1 = new Commentaire();
$c1->idCommentaire = "0";
$c1->titre = "Premier Commentaire de steven";
$c1->contenu = "Tres bon jeu";
$fdate1 = date_create_from_format('j/m/Y', '24/03/2022');
$formatted_date1 = date_format($fdate1, 'Y-m-d');
$c1->dateCreation = $formatted_date1;
$date1 = DateTime::createFromFormat("Y/m/d (G:i)", "2022/03/25 (16:15)");
$update1 = DateTime::createFromFormat("Y/m/d (G:i)", "2022/03/26 (16:15)");
$c1->created_at = $date1;
$c1->updated_at = $update1;
$c1->emailUser = "rudi@gmail.com";
$c1->idJeu = "12342";
$c1->save();

/*
$game = Game::find(12341);
$c1 = new Comment();
$c1->titre = "c'est pourri";
$c1->contenu = "ce jeu est nul";
$c1->game()->associate($game);
$c1->user()->associate($us1);
$c1->save();
 */
$c2 = new Commentaire();
$c2->idCommentaire = "1";
$c2->titre = "Deuxieme Commentaire de zaer";
$c2->contenu = "nul ! ";
$fdate2 = date_create_from_format('j/m/Y', '27/03/2022');
$formatted_date2 = date_format($fdate2, 'Y-m-d');
$c2->dateCreation = $formatted_date2;
$date2 = DateTime::createFromFormat("Y/m/d (G:i)", "2022/03/28 (16:15)");
$update2 = DateTime::createFromFormat("Y/m/d (G:i)", "2022/03/29 (16:15)");
$c2->created_at = $date2;
$c2->updated_at = $update2;
$c2->emailUser = "rudi@gmail.com";
$c2->idJeu = "12342";
$c2->save();

$c3 = new Commentaire();
$c3->idCommentaire = "2";
$c3->titre = "Troisieme Commentaire de zaer";
$c3->contenu = "10/10!";
$fdate3 = date_create_from_format('j/m/Y', '01/04/2022');
$formatted_date3 = date_format($fdate3, 'Y-m-d');
$c3->dateCreation = $formatted_date3;
$date3 = DateTime::createFromFormat("Y/m/d (G:i)", "2022/04/10 (16:15)");
$update3 = DateTime::createFromFormat("Y/m/d (G:i)", "2022/04/10 (16:15)");
$c3->created_at = $date3;
$c3->updated_at = $update3;
$c3->emailUser = "rudi@gmail.com";
$c3->idJeu = "12342";
$c3->save();


$c4 = new Commentaire();
$c4->idCommentaire = "3";
$c4->titre = "Premier Commentaire de tyu";
$c4->contenu = "Tres bon jeu!";
$fdate4 = date_create_from_format('j/m/Y', '15/04/2022');
$formatted_date4 = date_format($fdate4, 'Y-m-d');
$c4->dateCreation = $formatted_date4;
$date4 = DateTime::createFromFormat("Y/m/d (G:i)", "2022/04/16 (16:15)");
$update4 = DateTime::createFromFormat("Y/m/d (G:i)", "2022/04/17 (16:15)");
$c4->created_at = $date4;
$c4->updated_at = $update4;
$c4->emailUser = "tyu@gmail.com";
$c4->idJeu = "12342";
$c4->save();

$c5 = new Commentaire();
$c5->idCommentaire = "4";
$c5->titre = "Deuxieme Commentaire de tyu";
$c5->contenu = "Bj'aime !";
$fdate5 = date_create_from_format('j/m/Y', '19/04/2022');
$formatted_date5 = date_format($fdate5, 'Y-m-d');
$c5->dateCreation = $formatted_date5;
$date5 = DateTime::createFromFormat("Y/m/d (G:i)", "2022/04/20 (16:15)");
$update5 = DateTime::createFromFormat("Y/m/d (G:i)", "2022/04/21 (16:15)");
$c5->created_at = $date5;
$c5->updated_at = $update5;
$c5->emailUser = "tyu@gmail.com";
$c5->idJeu = "12342";
$c5->save();

$c6 = new Commentaire();
$c6->idCommentaire = "5";
$c6->titre = "Troisieme Commentaire de tyu";
$c6->contenu = "Bien!";
$fdate6 = date_create_from_format('j/m/Y', '25/04/2022');
$formatted_date6 = date_format($fdate6, 'Y-m-d');
$c6->dateCreation = $formatted_date6;
$date6 = DateTime::createFromFormat("Y/m/d (G:i)", "2022/04/26 (16:15)");
$update6 = DateTime::createFromFormat("Y/m/d (G:i)", "2022/04/27 (16:15)");
$c6->created_at = $date6;
$c6->updated_at = $update6;
$c6->emailUser = "tyu@gmail.com";
$c6->idJeu = "12342";
$c6->save();