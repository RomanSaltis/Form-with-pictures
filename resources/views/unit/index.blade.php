@foreach ($units as $unit)
  <a href="{{route('unit.edit',[$unit])}}">{{$unit->title}} {{$unit->unitRole->name}} {{$unit->unitRole->super_unit}}</a>
  <form method="POST" action="{{route('unit.destroy', [$unit])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach



