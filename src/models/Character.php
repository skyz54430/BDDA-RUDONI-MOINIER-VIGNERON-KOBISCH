<?php


declare(strict_types=1);

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = "character";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function appearsIn() {
        return $this->belongsToMany('gamepedia\models\Game','game2character','game_id','character_id');
    }

    public function firstAppearsIn(){
        return $this->belongsTo('gamepedia\models\Game','first_appeared_in_game_id');
    }
    
    public function friends() {
        return $this->belongsToMany('gamepedia\models\character','friends','char1_id','char2_id');
    }

    public function Ennemy() {
        return $this->belongsToMany('gamepedia\models\character','enemies','char1_id','char2_id');
    }

}