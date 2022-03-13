<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class Categorie extends Model
{

    Public $table = “Categorie”;
    Public $primaryKey = “id”;

    Public function annonces() {
	    Return $this->belongsToMany(‘Annonce’, ‘categLieAnnonce’, ‘id_categ’, ‘id_annonce’)
    }

}