<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConnectionController extends Controller
{

    // Récupération de toutes les connections
    public function index ()
    {
        // Récupération de toutes les connections brutes
        // $connections = Connection::all();

        // Récuparation des connections avec les données des utilisateurs

        $connections = Connection::with('user')->get();
        

        return Inertia::render('Connections/index', [
            'connections' => $connections,
        ]);
    }
}
