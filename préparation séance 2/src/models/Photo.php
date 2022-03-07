<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class Photo extends Model
{

    protected $table = 'photo';
    protected $primaryKey = 'file';
    public $incrementing = true;
    public $timestamps = false;

    public function photo()
    {
        return $this->hasOne('./Annonce');
    }

}