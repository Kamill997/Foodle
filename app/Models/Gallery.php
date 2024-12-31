<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table='immagini';

    public $timestamps = false;

    protected $fillable=[
        'Nome',
        'Img'       //Unici campi modificabili
    ];
}

?>