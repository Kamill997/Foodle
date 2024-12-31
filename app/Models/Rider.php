<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    protected $table='rider';

    public $timestamps = false;

    protected $fillable=[
        'Nome'
    ];
    
    public function rider()
    {
        return $this->hasMany("App\Models\Checkout","ID_Rider");
    }

}

?>