@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Rolė</div>

               <div class="card-body">

               <table class="table">
                          <tr>
                              <th>Rolė</th>
                              <th>Teisės</th>
                              @auth
                              <th>Redaguoti</th>
                              <th>Trinti</th>
                              @endauth
                          </tr>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>{{$role->super_unit}}</td>
                                @auth                             
                                <td><a class="btn btn-primary" href="{{route('role.edit',[$role])}}">Redaguoti</a></td>   
                                <td>
                                <form method="POST" action="{{route('role.destroy', $role)}}">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">Ištrinti</button>
                                </form>  
                                </td> 
                                @endauth                         
                            </tr>
                        @endforeach
                      </table>
                 
                  
               </div>
           </div>
       </div>
   </div>
</div>
@endsection


