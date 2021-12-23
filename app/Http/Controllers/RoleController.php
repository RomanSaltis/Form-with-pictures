<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Validator;

class RoleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $roles = Role::all();
       return view('role.index', ['roles' => $roles]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    
    {

        $request->role_name =  ucwords(strtolower($request->role_name));
       
        $validator = Validator::make($request->all(),
            [
                'role_name' => ['required', 'min:2', 'max:30'],
                'role_super_unit' => ['required', 'min:1', 'max:30'],
            ],
            [
                'role_name.required' => 'Laukas "Vardas" privalomas',
                'role_name.min' => 'Laukas "Vardas" privalomas',
                'role_name.max' => 'Laukas "Vardas" privalomas',

                'role_super_unit.required' => 'super_unit privaloma',
                'role_super_unit.min' => 'super_unit per trumpa',
                'role_super_unit.max' => 'super_unit per ilga',


            ]
        );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }



        $role = new Role;
        $role->name = $request->role_name;
        $role->super_unit = $request->role_super_unit;
        $role->save();
        return redirect()->route('role.index')->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('role.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {

        $request->role_name =  ucwords(strtolower($request->role_name));
       
        $validator = Validator::make($request->all(),
            [
                'role_name' => ['required', 'min:2', 'max:30'],
                'role_super_unit' => ['required', 'min:1', 'max:30'],
            ],
            [
                'role_name.required' => 'Autoriaus vardas privalomas',
                'role_name.min' => 'Autoriaus vardas per trumpas',
                'role_name.max' => 'Autoriaus vardas per ilgas',

                'role_super_unit.required' => 'Autoriaus pavardė privaloma',
                'role_super_unit.min' => 'Autoriaus pavardė per trumpa',
                'role_super_unit.max' => 'Autoriaus pavardė per ilga',


            ]
        );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }


       $role->name = $request->role_name;
       $role->super_unit = $request->role_super_unit;
       $role->save();
       return redirect()->route('role.index')->with('success_message', 'Sėkmingai pakeistas.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
       if($role->roleUnits->count()){
           return redirect()->route('role.index')->with('info_message', 'Trinti negalima, nes turi unit.');
       }
       $role->delete();
       return redirect()->route('role.index')->with('success_message', 'Sekmingai ištrintas.');


    }
}
