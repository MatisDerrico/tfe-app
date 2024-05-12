<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function index()
    {
         $services = Service::all();

        return Inertia::render('Services/index', [
            'services' => $services,
        ]);
    }
}
