<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    //use HasFactory,Notifiable;  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'utente';

    public $timestamps = false;

    protected $fillable = [
        'Username',
        'Password',
        'Email',
        'Nome',
        'Cognome',
        'Pic'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function immagine_user()
    {
        return $this->hasOne('App\Models\Immagine_User', 'id_user');
    }

    public function cart()
    {
        return $this->hasMany("App\Models\Cart", "ID_Utente");
    }

    public function checkout()
    {
        return $this->hasMany("App\Models\Checkout", "ID_Utente");
    }

    public function contact()
    {
        return $this->hasMany("App\Models\Contact", "ID_Utente");
    }
}
