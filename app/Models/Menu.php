<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table='menu';

    public $timestamps = false;

    protected $fillable=[
        'Tipo',
        'Nome',
        'Descrizione',
        'Img'                          //Unici campi modificabili
    ];

    public function cart()
    {
        return $this->hasMany("App\Models\Cart","ID_Cibo");
    }

    
    public function checkout()
    {
        return $this->hasMany("App\Models\Checkout","ID_Cibo");
    }
}

?>