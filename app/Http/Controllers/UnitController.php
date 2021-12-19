<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\Role;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $units = Unit::all();
       return view('unit.index', ['units' => $units]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('unit.create', ['roles' => $roles]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnitRequest $request)
    {
       $unit = new Unit;
       $unit->name = $request->unit_name;
       $unit->surname = $request->unit_surname;
       $unit->phone = $request->unit_phone;
       $unit->address = $request->unit_address;
       $unit->profile_photo = $request->unit_profile_photo;
       $unit->role_id = $request->role_id;
       $unit->save();
       return redirect()->route('unit.index')->with('success_message', 'Sekmingai įrašytas.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
       $roles = Role::all();
       return view('unit.edit', ['unit' => $unit, 'roles' => $roles]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnitRequest  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnitRequest $request, Unit $unit)
    {
       $unit->name = $request->unit_name;
       $unit->surname = $request->unit_surname;
       $unit->phone = $request->unit_phone;
       $unit->address = $request->unit_address;
       $unit->profile_photo = $request->unit_profile_photo;
       $unit->role_id = $request->role_id;
       $unit->save();
       return redirect()->route('unit.index')->with('success_message', 'Sėkmingai pakeistas.');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
       return redirect()->route('unit.index')->with('success_message', 'Sekmingai ištrintas.');

    }
}
