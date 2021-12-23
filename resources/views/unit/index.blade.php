

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Vartotojas</div>

               <div class="card-header">
                 <form action="{{route('unit.indexSpecifics')}}" method="get">
                   Rūšiavimas
                   <select class="form-control" name="order" id="">
                     <option value="0">rūšiuokite pagal</option>
                     <option value="name">Vardas</option>
                     <option value="surname">Pavardė</option>
                     
                   </select>
                   Filtravimas
                   <select class="form-control" name="filter" id="">
                     <option value="0">filtruokite pagal</option>
                     @foreach($consumers as $consumer)
                     <option value="{{$consumer->id}}">{{$consumer->name}}{{$consumer->super_unit}} </option>
                     @endforeach
                   </select>
                   <button class="btn btn-primary" type="submit">rūšiuokite</button>
                   <a class="btn btn-secondary" href="{{route('unit.index')}}">Išvalyti</a>
                 </form>
                 
                </div>

               <div class="card-body">

               <table class="table">
                          <tr>
                              <th>Vardas</th>
                              <th>Pavardė</th>
                              <th>Rolė</th>
                              <th>Telefono numeris</th>
                              <th>Adresas</th>
                              <th>Nuotrauka</th>
                              @auth
                              <th>Redaguoti</th>
                              <th>Trinti</th>
                              @endauth
                          </tr>
                        @foreach ($units as $unit)
                            <tr>
                                <td>{{$unit->name}}</td>
                                <td>{{$unit->surname}}</td>
                                <td>{{$unit->unitRole->name}} {{$unit->unitRole->super_unit}}</td>
                                <td>{{$unit->phone}}</td>
                                <td>{{$unit->address}}</td>
                                <td>
                                    <img src="{{asset('unitPhotos/'.$unit->profile_photo)}}" alt="unitnuotrauka" width="128" height="128">
                                </td>
                                   @auth
                                <td><a class="btn btn-secondary" href="{{route('unit.edit',[$unit])}}">Redaguoti</a></td>   
                                <td>
                                <form method="POST" action="{{route('unit.destroy', $unit)}}">
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




