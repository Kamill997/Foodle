<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table='carrello';

    public $timestamps = false;

    protected $fillable=[
        'ID_Cibo',
        'ID_Utente',
        'Prezzo_Cibo',
        'Nome_Cibo',
        'Img_Cibo',
        'Quantita',
        'Tot'                          //Unici campi modificabili
    ];
    
    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function menu()
    {
        return $this->belongsTo("App\Models\Menu");
    }
}

?>