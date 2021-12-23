@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Vartotojo redagavimas</div>

               <div class="card-body">
                 

                    <form method="POST" action="{{route('unit.update',[$unit])}}">
                        <div class="form-group">
                            <label>Vardas</label>
                            <input type="text" class="form-control" name="unit_name" value="{{old('unit_name',$unit->name)}}">
                            <small class="form-text text-muted">Name</small>
                        </div>  
                        <div class="form-group">
                            <label>Pavardė</label>
                            <input type="text" class="form-control" name="unit_surname" value="{{old('unit_surname',$unit->surname)}}">
                            <small class="form-text text-muted">Surname</small>
                        </div>
                        <div class="form-group">
                            <label>Telefono numeris</label>
                            <input type="text" class="form-control" name="unit_phone" value="{{old('unit_phone',$unit->phone)}}">
                            <small class="form-text text-muted">Phone</small>
                        </div>
                        <div class="form-group">
                            <label>Adresas</label>
                            <textarea class="form-control" name="unit_address" value="{{old('unit_address', $unit->address)}}"></textarea>
                            <small class="form-text text-muted">Address</small>
                        </div>
                        <div class="form-group">
                            <label>Nuotrauka</label>
                            <input type="text" class="form-control" name="unit_profile_photo" value="{{$unit->profile_photo}}">
                            <small class="form-text text-muted">Photo</small>
                        </div>
                        
                        <div class="form-group">
                            <label>Rolė</label>
                                <select name="role_id" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}" @if($role->id == $unit->role_id) selected @endif>
                                            {{$role->name}} {{$role->super_unit}}
                                        </option>
                                    @endforeach
                                </select>
                            <small class="form-text text-muted">Role</small>
                        </div>
                    
                        @csrf
                        <button class="btn btn-success" type="submit">Atnaujinti</button>
                    </form>
             </div>
           </div>
       </div>
   </div>
</div>
@endsection


