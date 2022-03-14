<?php


declare(strict_types=1);

namespace gamepedia\models;

class Platform extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "platform";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function platfrom_producer() {
        return $this->belongsToMany('gamepedia\models\Company', 'platform' , 'platform_id', 'company_id');
    }
    public function platfrom_game() {
        return $this->belongsToMany('gamepedia\models\Game', 'platform' , 'platform_id', 'game_id');
    }


}


