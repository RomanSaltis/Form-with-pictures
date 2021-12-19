@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">PAVADINIMAS unit</div>

               <div class="card-body">
                 

                    <form method="POST" action="{{route('unit.update',[$unit])}}">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="unit_name" value="{{$unit->name}}">
                            <small class="form-text text-muted">Name</small>
                        </div>  
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" class="form-control" name="unit_surname" value="{{$unit->surname}}">
                            <small class="form-text text-muted">Surname</small>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="unit_phone" value="{{$unit->phone}}">
                            <small class="form-text text-muted">Phone</small>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="unit_address">{{$unit->address}}</textarea>
                            <small class="form-text text-muted">Address</small>
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="text" class="form-control" name="unit_profile_photo" value="{{$unit->profile_photo}}">
                            <small class="form-text text-muted">Phone</small>
                        </div>
                        
                        <div class="form-group">
                            <label>Role</label>
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
                        <button type="submit">EDIT</button>
                    </form>


               </div>
           </div>
       </div>
   </div>
</div>
@endsection


