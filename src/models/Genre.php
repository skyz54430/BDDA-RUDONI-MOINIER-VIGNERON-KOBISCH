<?php

namespace applibd\models;

class Genre extends \Illuminate\Database\Eloquent\Model
{
	protected $table = "genre";
	public $timestamps = false;

    public function jeux(){
        return $this->belongsToMany('applibd\models\Game', 'game2genre', 'genre_id', 'game_id');
    }

}