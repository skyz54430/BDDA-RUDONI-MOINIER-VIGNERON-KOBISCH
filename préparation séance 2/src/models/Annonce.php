<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class Annonce extends Model
{

    Public $table = “annonce”;
	Public $primaryKey = «id»;

	Public function photos() {
		Return $this->hasMany('namespace\models\Photo’, 'id')
    }

}