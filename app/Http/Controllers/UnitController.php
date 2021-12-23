<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;
use Str;


class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $units = Unit::all();
       $units = Unit::orderBy('name')->orderBy('role_id')->get();
       $consumers = Role::all();
       return view('unit.index', ['units' => $units, 'consumers' => $consumers]);

    }

    public function indexSpecifics(Request $request)
    {
        $order = $request->order;
        $filter = $request->filter;
        $units = Unit::all();

        if($order != 0){
            $units = $units->sortBy($order);
                        
        }
        if($filter != 0){
               $units = $units->where('role_id','=',$filter); 
            }
    
       $consumers = Role::all();
       return view('unit.index', ['units' => $units, 'consumers' => $consumers]);

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
        
      $request->unit_name =  ucwords(strtolower($request->unit_name));
      $request->unit_surname =  ucwords(strtolower($request->unit_surname));
       
        $validator = Validator::make($request->all(),
            [
                'unit_name' => ['required', 'min:2', 'max:30'],
                'unit_surname' => ['required', 'min:2', 'max:30'],
                'unit_phone' => ['required', 'min:8', 'max:12'],
                'unit_address' => ['required', 'min:2', 'max:10000'],
                
                
            ],
            [
                'unit_name.required' => 'Laukas "Vardas" privalomas',
                'unit_name.min' => 'Laukas "Vardas" per trumpas',
                'unit_name.max' => 'Laukas "Vardas" per ilgas',

                'unit_surname.required' => 'Laukas "Pavardė " privalomas',
                'unit_surname.min' => 'Laukas "Pavardė " reikšmė per maža',
                'unit_surname.max' => 'Laukas "Pavardė " reikšmė per didelė',

               
                'unit_phone.required' => 'Laukas "Telefono numeris" privalomas',
                'unit_phone.min' => 'Lauko "Telefono numeris" reikšmė per maža',
                'unit_phone.max' => 'Lauko "Telefono numeris" reikšmė per didelė',

                'unit_address.required' => 'Laukas "Adresas" privalomas',
                'unit_address.min' => 'Lauko "Adresas" reikšmė per maža',
                'unit_address.max' => 'Lauko "Adresas" reikšmė per didelė',

                

                

            ]
        );
    if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
    }     
        $unit = new Unit;
     
        if($request->has('unit_profile_photo')){
            $img = Image::make($request->file('unit_profile_photo'));
            $fileName = $request->unit_surname. Str::random(10). ".jpg";
            $folder = public_path('/unitPhotos');
            $img->resize(1200,null, function($constraint){
                $constraint->aspectRatio();
            });
            $img->save($folder.'/'.$fileName,50,'jpg');
            $unit->profile_photo = $fileName;

        }
       
       
       

      

       
       $unit->name = $request->unit_name;
       $unit->surname = $request->unit_surname;
       $unit->phone = $request->unit_phone;
       $unit->address = $request->unit_address;
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

      $request->unit_name =  ucwords(strtolower($request->unit_name));
      $request->unit_surname =  ucwords(strtolower($request->unit_surname));
       
        $validator = Validator::make($request->all(),
            [
                'unit_name' => ['required', 'min:2', 'max:30'],
                'unit_surname' => ['required', 'min:2', 'max:30'],
                'unit_phone' => ['required', 'min:8', 'max:12'],
                'unit_address' => ['required', 'min:2', 'max:10000'],
                
                
            ],
            [
                'unit_name.required' => 'Laukas "Vardas" privalomas',
                'unit_name.min' => 'Laukas "Vardas" per trumpas',
                'unit_name.max' => 'Laukas "Vardas" per ilgas',

                'unit_surname.required' => 'Laukas "Pavardė " privalomas',
                'unit_surname.min' => 'Laukas "Pavardė " reikšmė per maža',
                'unit_surname.max' => 'Laukas "Pavardė " reikšmė per didelė',

               
                'unit_phone.required' => 'Laukas "Telefono numeris" privalomas',
                'unit_phone.min' => 'Lauko "Telefono numeris" reikšmė per maža',
                'unit_phone.max' => 'Lauko "Telefono numeris" reikšmė per didelė',

                'unit_address.required' => 'Laukas "Adresas" privalomas',
                'unit_address.min' => 'Lauko "Adresas" reikšmė per maža',
                'unit_address.max' => 'Lauko "Adresas" reikšmė per didelė',

                

                

            ]
        );
    if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
    }     


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
