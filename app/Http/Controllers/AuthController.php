<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Gallery;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //REGISTRAZIONE 
    public function register(request $request)
    {
        $request->validate([
            'Nome' => 'required|string|max:255',
            'Cognome' => 'required|string|max:255',
            'Username' => 'required|string|max:255',
            'Email' => 'required|email|string|max:255',
            'Password' => 'required|string|max:255'
        ]);

        $user = User::Create([
            'Nome' => $request->Nome,
            'Cognome' => $request->Cognome,
            'Username' => $request->Username,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password)
        ]);

        if ($user) {
            if ($request->hasFile('Pic')) {
                $path = $request->file('pic')->store('img/profile/', 'public');
                $user->immagine_user()->create(['path' => '/storage/' . $path]);
            } else {
                $user->immagine_user()->create(['path' => '/storage/img/profile/default.png']);
            }
            Auth::login($user);
            return redirect()->route("menu")->with('message', 'Account registrato correttamente!');
        } else {
            return redirect("registration")
                ->withInput($request->except('password'))->with('message', 'Account non registrato!');
        }
    }

    public function pick()
    {
        $query = Gallery::all();
        return response()->json($query);
    }

    public function check()
    {
        if (!Auth::check())
            return view("registration");
        else
            return redirect()->route('menu');
    }

    public function checkUsername(Request $request)
    {
        $username = $request->input('Username');

        if (!$username) {
            return response()->json(['exists' => false, 'errore' => 'Il campo username è obbligatorio.'], 400);
        }

        $query = User::where('Username', $username)->first();
        return response()->json(['exists' => $query]);
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('Email');

        if (!$email) {
            return response()->json(['exists' => false, 'errore' => 'Il campo email è obbligatorio.'], 400);
        }

        $query = User::where('Email', $email)->exists();
        return response()->json(['exists' => $query]);
    }

    //LOGIN
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route("menu");
        } else {
            return view('login')
                ->with('csrf_token', csrf_token());
        }
    }

    public function checklogin(Request $request)
    {
        $request->validate([
            'Username' => 'required|string',
            'Password' => 'required|string',
        ]);

        $input = $request->input('Username');

        $password = $request->input('Password');

        $utente = User::where('Username', $input)->first();

        /*if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $utente = User::where('email', $input)->first();
        } else {
            $utente = User::where('username', $input)->first();
        }*/

        if ($utente && Hash::check($password, $utente->Password)) {
            Auth::login($utente);
            return redirect()->route('menu');
        } else {
            return redirect('login')->withInput($request->except('Password'))->withErrors(['login' => 'Credenziali non valide.']);
        }
    }

    //LOGOUT
    public function logout(request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('home');
    }
}
