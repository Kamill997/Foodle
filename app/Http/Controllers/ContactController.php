<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {

        if (!Auth::check())
            return redirect("login");
        else {
            $user = Auth::user();
            return view("menu")->with("user", $user);
        }
    }

    private function Errori($res)
    {
        $error = array();

        if (!$res->validate([
            'Email' => ['regex:/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/']
        ])) {
            $error[] = "Patten Email errato";
        }

        if (strlen($res['Messaggio']) < 1) {
            $error[] = "Messaggio troppo corto";
        }

        if (strlen($res['Dettagli']) < 1) {
            $error[] = "Dettagli insufficienti";
        }

        return count($error);
    }


    public function pick()
    {
        $query = Gallery::all();
        return $query;
    }

    public function addRequest(Request $request)
    {
        $userId = Auth::id();
        if ($this->Errori($request) === 0) {
            $richiesta = Contact::create([
                'ID_Utente' => $userId,
                'Email' => $request->Email,
                'Messaggio' => $request->Messaggio,
                'Dettagli' => $request->Dettagli
            ]);

            if ($richiesta) {
                return ['message' => "Richiesta inviata con successo"];
            } else {
                return ['messagge' => "Problemi durante l'invio.Ti preghiamo di riprovare"];
            }
        } else {
            return ['message' => "Errore durante l'invio della tua richiesta"];
        }
    }
}
