<form method="POST" action="{{route('role.store')}}">
   Name: <input type="text" name="role_name">
   Super_unit: <input type="text" name="role_super_unit">
   @csrf
   <button type="submit">ADD</button>
</form>
