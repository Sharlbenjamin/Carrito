<select name="type_id" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
    @if (isset($car->type_id))
    <option value="{{$car->type->name}}">{{$car->type->name}}</option>
    @else
    <option value="">Select Car Type</option>
    @endif
    @foreach ($types as $type)
        <option value="{{$type->id}}">{{$type->name}}</option>
    @endforeach
 </select>