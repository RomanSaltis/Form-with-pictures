@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Įrašykite rolę</div>

               <div class="card-body">
                 
               <form method="POST" action="{{route('role.store')}}">
                   <div class="form-group">
                        <label>Rolė</label>
                        <input type="text" class="form-control" name="role_name" value="{{old('role_name')}}">
                        <small class="form-text text-muted">role</small>
                    </div>

                    <div class="form-group">
                        <label>Teisės</label>
                        <input type="text" class="form-control" name="role_super_unit" value="{{old('role_super_unit')}}">
                        <small class="form-text text-muted">status</small>
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

