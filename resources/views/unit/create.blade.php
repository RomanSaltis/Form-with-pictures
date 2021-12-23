@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Vartotojo įvedimas</div>

               <div class="card-body">
                 

                    <form method="POST" action="{{route('unit.store')}}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Vardas</label>
                            <input type="text" class="form-control" name="unit_name" value="{{old('unit_name')}}">
                            <small class="form-text text-muted">name</small>
                        </div>
                        <div class="form-group">
                            <label>Pavardė</label>
                            <input type="text" class="form-control" name="unit_surname" value="{{old('unit_surname')}}">
                            <small class="form-text text-muted">surname</small>
                        </div>
                        <div class="form-group">
                            <label>Telefono numeris</label>
                            <input type="text" class="form-control" name="unit_phone" value="{{old('unit_phone')}}">
                            <small class="form-text text-muted">phone</small>
                        </div>
                        <div class="form-group">
                            <label>Adresas</label>
                            <textarea class="form-control" name="unit_address" value="{{old('unit_address')}}"></textarea>
                            <small class="form-text text-muted">address</small>
                        </div>
                        <div class="form-group">
                            <label>Nuotrauka</label>
                            <input type="file" class="form-control" name="unit_profile_photo">
                            <small class="form-text text-muted">picture</small>
                        </div>
                        
                        <div class="form-group">
                            <label>Rolė</label>
                                <select name="role_id" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}} {{$role->super_unit}}</option>
                                    @endforeach
                                </select>
                            <small class="form-text text-muted">role</small>
                        </div>
                        
                        @csrf
                        <button class="btn btn-success" type="submit">Įrašyti</button>
                    </form> 
                

               </div>
           </div>
       </div>
   </div>
</div>
@endsection


