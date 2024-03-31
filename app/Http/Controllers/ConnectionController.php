<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{

    // Récupération de toutes les connections
    public function index ()
    {
        return Connection::all();
    }
}
