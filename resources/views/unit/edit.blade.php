<form method="POST" action="{{route('unit.update',[$unit])}}">
       Name: <input type="text" name="unit_name" value="{{$unit->name}}">
       Surname: <input type="text" name="unit_surname" value="{{$unit->surname}}">
       Phone: <input type="text" name="unit_phone" value="{{$unit->phone}}">
       Address: <textarea name="unit_address">{{$unit->address}}</textarea>
       Profile_photo: <input type="text" name="unit_profile_photo" value="{{$unit->profile_photo}}">

       <select name="role_id">
           @foreach ($roles as $role)
               <option value="{{$role->id}}" @if($role->id == $unit->role_id) selected @endif>
                   {{$role->name}} {{$role->super_unit}}
               </option>
           @endforeach
</select>
       @csrf
       <button type="submit">EDIT</button>
</form>

