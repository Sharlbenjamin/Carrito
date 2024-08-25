@props(['disabled' => false, 'name' => $name, 'value' => $value])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['name' => $name, 'value' => $value,'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
@error($name)
<p class="text-sm text-red-600">{{$message}}</p>
@enderror

