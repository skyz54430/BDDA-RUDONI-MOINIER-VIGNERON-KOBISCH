<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class Categorie extends Model
{

    protected $table = 'categorie';
    protected $primaryKey = 'nom';
    public $incrementing = true;
    public $timestamps = false;

    public function categorie()
    {
        return $this->belongsToMany('./Annonce');
    }

}