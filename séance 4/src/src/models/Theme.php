<?php


declare(strict_types=1);

namespace gamepedia\models;

class Theme extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "theme";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function theme() {
        return $this->belongsToMany('gamepedia\models\Game', 'game' , 'theme_id', 'game_id');
    }
}