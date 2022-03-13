<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class Photo extends Model
{
    Public $table = “photo”;
    Public $primaryKey = “id”;
    
    Public function Annonce() {
        Return $this->hasMany('namespace\models\Annonce, 'id')
    
    }
}