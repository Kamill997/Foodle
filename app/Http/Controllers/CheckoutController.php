<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Checkout;
use App\Models\Cart;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Rider;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::where('ID_Utente', $user->id)->first();
        if (!isset($user))
            return redirect("login");
        else if ($cart == true)
            return view("checkout")->with('user', $user);
        else
            return view("home")->with('user', $user);
    }

    public function pick()
    {
        $query = Gallery::all();
        return $query;
    }

    public function itemCart()
    {
        $query = Cart::where("ID_Utente", Auth::user()->id)->get();

        return $query;
    }

    private function Errori($res)
    {
        $error = array();

        if (!$res->validate([
            'Email' => ['regex:/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/']
        ])) {
            $error[] = "Patten Email errato";
        }

        if (!$res->validate([
            'Cellulare' => ['regex:/^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/']
        ])) {
            $error[] = "Patten Cellulare errato";
        }

        if (strlen($res['Indirizzo']) < 1) {
            $error[] = "Indirizzo non corretto";
        }

        if (strlen($res['Prov']) < 1) {
            $error[] = "Dettagli insufficienti";
        }

        if (strlen($res['Prop']) < 1) {
            $error[] = "Dettagli insufficienti";
        }

        return count($error);
    }

    public function addCheck()
    {
        $rider = rand(1, 5);
        $request = Request();
        $user = Auth::user();
        $nomeRider = Rider::find($rider);

        if ($this->Errori($request) === 0) {
            if ($request->stripeToken) {
                $transazione = Omnipay::create('Stripe');
                $transazione->setApiKey(env('STRIPE_SECRET_KEY'));

                $token = $request->stripeToken;

                $response = $transazione->purchase([
                    'amount' => $request->Tot,
                    'currency' => 'EUR',
                    'token' => $token
                ])->send();

                if ($response->isSuccessful()) {
                    //Inserisco i dati nel database
                    $id_pagamento = $response->getData();

                    $CheckPagamento = Checkout::where('Ricevuta_Pagamento', $id_pagamento['id'])->first();

                    if (!$CheckPagamento) {
                        $pagamento = Checkout::create([
                            'Ricevuta_Pagamento' => $id_pagamento['id'],
                            'ID_Utente' => $user->id,
                            'Email' => $request->Email,
                            'Cellulare' => $request->Cellulare,
                            'Indirizzo' => $request->Indirizzo,
                            'Provincia' => $request->Prov,
                            'Proprietario_Carta' => $request->Prop,
                            'Tot' => $id_pagamento['amount'] / 100,
                            'Valuta' => 'EUR',
                            'Stato_Pagamento' => $id_pagamento['status'],
                            'ID_Rider' => $rider
                        ]);

                        Cart::where('ID_Utente', $user->id)->delete();
                    }

                    return view("success")->with('message', "Pagamento effettuato con successo.
                    L'id del tuo pagamento e' : " . $id_pagamento['id'] . ".Il tuo rider e' : " . $nomeRider->Nome);
                } else {
                    //Pagamento fallito
                    return view('failed')->with('message', $response->getMessage());
                }
            }
        } else {
            return redirect("checkout")->withInput();
        }
    }
}
