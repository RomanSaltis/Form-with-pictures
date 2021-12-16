<form method="POST" action="{{route('unit.store')}}">
   Name: <input type="text" name="unit_name">
   Surname: <input type="text" name="unit_surname">
   Phone: <input type="text" name="unit_phone">
   Address: <textarea name="unit_address"></textarea>
   Profile_photo: <input type="text" name="unit_profile_photo">

   <select name="role_id">
       @foreach ($roles as $role)
           <option value="{{$role->id}}">{{$role->name}} {{$role->super_unit}}</option>
       @endforeach
</select>
   @csrf
   <button type="submit">ADD</button>
</form>

