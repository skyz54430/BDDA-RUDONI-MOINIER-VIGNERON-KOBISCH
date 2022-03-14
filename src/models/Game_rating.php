<?php

namespace applibd\models;

class Game_rating extends \Illuminate\Database\Eloquent\Model
{
	protected $table = "game_rating";
	protected $primaryKey = "id";
	public $timestamps = false;

	public function original_game_ratings() {
		return $this->belongsToMany('applibd\models\Game', 'game2rating' , 'rating_id', 'game_id');
	}

    public function game_ratingTorating_board() {
        return $this->belongsTo('applibd\models\Rating_board', 'rating_board_id');
    }
}