<form method="POST" action="{{route('role.update',$role)}}">
   Name: <input type="text" name="role_name" value="{{$role->name}}">
   Super_unit: <input type="text" name="role_super_unit" value="{{$role->super_unit}}">
   @csrf
   <button type="submit">EDIT</button>
</form>
