@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Name role</div>

               <div class="card-body">

                  <form method="POST" action="{{route('role.update',$role)}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="role_name" value="{{$role->name}}">
                        <small class="form-text text-muted">Kažkoks parašymas.</small>
                    </div>

                    <div class="form-group">
                        <label>Super_unit</label>
                        <input type="text" class="form-control" name="role_super_unit" value="{{$role->super_unit}}">
                        <small class="form-text text-muted">Super_unit</small>
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

