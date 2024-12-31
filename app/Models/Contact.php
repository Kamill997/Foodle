<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table='contattaci';

    public $timestamps = false;

    protected $fillable=[
        'ID_Utente',
        'Email',
        'Messaggio',
        'Dettagli'     //Unici campi modificabili
    ];

    public function contact()
    {
        return $this->belongsTo("App\Models\User");
    }
}

?>