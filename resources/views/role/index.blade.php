
@foreach ($roles as $role)
  <a href="{{route('role.edit',[$role])}}">{{$role->name}} {{$role->super_unit}}</a>
  <form method="POST" action="{{route('role.destroy', $role)}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach

