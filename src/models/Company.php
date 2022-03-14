<?php


declare(strict_types=1);

namespace applibd\models;

class Company extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "company";
    protected $primaryKey = "id";
    public $timestamps = false;


    public function jeuxDevs(){
        return $this->belongsToMany('applibd\models\Game', 'game_developpers', 'comp_id', 'game_id');
    }

    public function jeuxPublies() {
        return $this->belongsToMany('applibd\models\Game', 'game_publishers', 'comp_id', 'game_id');
    }

    public function producer(){
        return $this->belongsToMany('applibd\models\Game', 'Platform', 'comp_id', 'platform_id');
    }
}