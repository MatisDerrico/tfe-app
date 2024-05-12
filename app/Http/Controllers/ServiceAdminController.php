<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceAdminController extends Controller
{
    public function index()
    {
         $services = Service::all();

        return Inertia::render('ServicesAdmin/index', [
            'services' => $services,
        ]);
    }

    public function create()
    {
        return Inertia::render('Services/create');
    }

    // Request c'est un objet qui fait transiter des données d'une page à l'autre
    // $request c'est la variable qui va contenir une instance de la classe Request
    public function store(StoreServiceRequest $request)
    {
        Service::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'duration'=>$request->duration,
            'type'=>$request->type
        ]);
    }


}
