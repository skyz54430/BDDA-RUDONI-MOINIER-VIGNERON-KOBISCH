<?php


declare(strict_types=1);

namespace applibd\models;

class Rating_board extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "rating_board";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function rating_boardTogame_rating() {
        return $this->hasMany('applibd\models\Game_rating', 'id');
    }
}