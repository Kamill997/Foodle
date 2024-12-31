<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MenuController extends Controller
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

    public function pick()
    {
        $query = Gallery::all();
        return $query;
    }

    public function header()
    {
        $api = Http::get('https://foodish-api.herokuapp.com/api/');
        if ($api->failed()) abort(500);

        return $api;
    }

    public function showMenu($res)
    {
        if ($res == 'Tutti') {
            $query = Menu::all();
            return $query;
        } else {
            $query = Menu::where('Tipo', $res)->get();
            return $query;
        }
    }

    public function addItem(Request $request)
    {
        $user_id = Auth::id();
        $tot = $request->quantita * $request->pprezzo;

        $query = Cart::where('ID_Cibo', $request->pid)->where('ID_Utente', $user_id)->exists();

        if ($query) {
            return ['exists' => $query];
        } else {
            $cibo = Cart::create([
                'ID_Cibo' => $request->pid,
                'ID_Utente' => $user_id,
                'Prezzo_Cibo' => $request->pprezzo,
                'Nome_Cibo' => $request->pnome,
                'Img_Cibo' => $request->pImg,
                'Quantita' => $request->quantita,
                'Tot' => $tot
            ]);

            if ($cibo) {
                return ['exists' => $query];
            }
        }
    }
}
