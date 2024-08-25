@props(['route'])
<td {{ $attributes->merge([ 'class' => 'relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0'])}}>
    <a href="{{$route}}" class="text-indigo-600 hover:text-indigo-900">{{$slot}}</a>
</td>