<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        return Inertia::render('Contact/index');
    }

    public function store(StoreContactRequest $request)
    {
        // return $request->all();
        Mail::to($request->email)->send(new ContactMail($request->nom, $request->prenom, $request->phone, $request->message));
    }
}
