

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Unit</div>

               <div class="card-header">
                 <form action="{{route('unit.indexSpecifics')}}" method="get">
                   Rūšiavimas
                   <select class="form-control" name="order" id="">
                     <option value="0">rūšiuokite pagal</option>
                     <option value="title">Pavadinimas</option>
                     <option value="pages">Puslapiai</option>
                     <option value="isbn">Isbn</option>
                   </select>
                   Filtravimas
                   <select class="form-control" name="filter" id="">
                     <option value="0">filtruokite pagal</option>
                     @foreach($creators as $creator)
                     <option value="{{$creator->id}}">{{$creator->name}} {{$creator->surname}}</option>
                     @endforeach
                   </select>
                   <button class="btn btn-primary" type="submit">rūšiuokite</button>
                   <a class="btn btn-secondary" href="{{route('unit.index')}}">Išvalyti</a>
                 </form>
                 
                </div>

               <div class="card-body">

               <table class="table">
                          <tr>
                              <th>name</th>
                              <th>surname</th>
                              <th>Role</th>
                              <th>phone</th>
                              <th>address</th>
                              <th>profile photo</th>
                              @auth
                              <th>Edit</th>
                              <th>Delete</th>
                              @endauth
                          </tr>
                        @foreach ($units as $unit)
                            <tr>
                                <td>{{$unit->name}}</td>
                                <td>{{$unit->surname}}</td>
                                <td>{{$unit->unitRole->name}} {{$unit->unitRole->super_unit}}</td>
                                <td>{{$unit->phone}}</td>
                                <td>{{$unit->address}}</td>
                                <td>{{$unit->profile_photo}}</td>
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

                 
                <!-- @foreach ($units as $unit)
                  <a href="{{route('unit.edit',[$unit])}}">{{$unit->title}} {{$unit->unitRole->name}} {{$unit->unitRole->super_unit}}</a>
                  <form method="POST" action="{{route('unit.destroy', [$unit])}}">
                  @csrf
                  <button type="submit">DELETE</button>
                  </form>
                  <br>
                @endforeach -->


               </div>
           </div>
       </div>
   </div>
</div>
@endsection




