<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class Annonce extends Model
{

    protected $table = 'annonce';
    protected $primaryKey = 'titre';
    public $incrementing = true;
    public $timestamps = false;

    public function annonce()
    {
        return $this->hasMany('./Photo');
    }

}