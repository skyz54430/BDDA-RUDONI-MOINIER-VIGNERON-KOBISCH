<?php


declare(strict_types=1);

namespace applibd\models;

class Game extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "game";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function hasCharacters() {
        return $this->belongsToMany('applibd\models\Character','game2character','game_id','character_id');
    }

    public function hasFirstAppearanceOf(){
        return $this->hasMany('applibd\models\Character','first_appeared_in_game_id');
    }

    public function compagniesDevelopers() {
        return $this->belongsToMany('applibd\models\Company', 'game_developers' , 'game_id', 'comp_id');
    }

    public function compagniesPublies() {
        return $this->belongsToMany('applibd\models\Company', 'game_publishers' , 'game_id', 'comp_id');
    }

	public function gameRating() {
		return $this->belongsToMany('applibd\models\Game_rating', 'game2rating' , 'game_id', 'rating_id');
	}


    public function similarGames() {
        return $this->belongsToMany('applibd\models\Game', 'similar_games' , 'game2_id', 'game1_id');
    }
    public function appears_in(){
        return $this->belongsToMany('applibd\models\Character', 'game' , 'game_id', 'character_id');
    }
    public function gameGenre(){
        return $this->belongsToMany('applibd\models\Genre', 'game' , 'game_id', 'genre_id');
    }
    public function gamePlatform(){
        return $this->belongsToMany('applibd\models\Platform', 'game' , 'game_id', 'platform_id');
    }
    public function gameTheme()
    {
        return $this->belongsToMany('applibd\models\Theme', 'game', 'game_id', 'theme_id');
    }
    public function genres(){
        return $this->belongsToMany('applibd\models\Genre', 'game2genre', 'game_id', 'genre_id');

    }
}