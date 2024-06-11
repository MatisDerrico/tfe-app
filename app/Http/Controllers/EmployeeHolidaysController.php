<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeHolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $holiday = Holiday::all();

        return Inertia::render('EmployeeHoliday/index', [
            'holiday' => $holiday,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('EmployeeHoliday/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Holiday::create([
            'user_id'=>$request->user_id,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $holidays = Holiday::where('user_id', $request->user_id)->select('date_debut', 'date_fin')->get();

        return $holidays;
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
