<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table='checkout';

    public $timestamps = false;

    protected $fillable=[
        'ID_Utente',
        'Ricevuta_Pagamento',
        'Email',
        'Cellulare',
        'Indirizzo',
        'Provincia',
        'Proprietario_Carta',
        'Valuta',
        'Tot',
        'Stato_Pagamento',
        'ID_Rider'
    ];
    
    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function menu()
    {
        return $this->belongsTo("App\Models\Menu");
    }

    public function rider()
    {
        return $this->belongsTo("App\Models\Rider");
    }


}

?>