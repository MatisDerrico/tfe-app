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

        $holidays = Holiday::with('user')->get();


        return Inertia::render('EmployeeHoliday/index', [
            'holidays' => $holidays,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = User::where('is_employee', true)->get();

        return Inertia::render('EmployeeHoliday/create', [
            'employees' => $employees
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Holiday::create([
            'user_id'=>$request->employee_id,
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
    public function edit(Request $request)
    {

        $holiday = Holiday::find($request->holiday);

        $employees = User::where('is_employee', true)->get();

        return Inertia::render('EmployeeHoliday/edit',[
            'holiday' => $holiday,
            'employees' => $employees,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Holiday $holiday, Request $request)
    {
        $holiday->update([
            'user_id'=>$request->user_id,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $holiday = Holiday::find($request->holiday);

        $holiday->delete();
    }
}
