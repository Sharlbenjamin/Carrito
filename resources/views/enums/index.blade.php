<x-app-layout>
        <x-slot name="header">
                Enums
        </x-slot>
        <div class="grid grid-cols-4">
            <div class="col-span-2">
                <x-table subject="Brands" description="" button="Add Brand" route="{{route('brands.create')}}">
                    <x-slot name="tableHeader">
                        <x-table-bold-header>Name</x-table-bold-header>
                        <x-table-bold-header>Type</x-table-bold-header>
                    </x-slot>
                    @if(isset($brands->first()->id))
                    @foreach ($brands as $brand)    
                    <tr>
                        <x-table-bold-header>
                            <a href="{{route('types.create', ['brand' => $brand])}}">
                                {{$brand->name}} 
                            </a>
                        </x-table-bold-header>
                        <x-table-column>
                            @if(isset($brand->types->first()->id))
                            @foreach($brand->types as $type)
                            {{$type->name}} /
                            @endforeach
                            @endif
                        </x-table-column>
                        <x-table-edit-column route="{{route('brands.edit', $brand)}}">Edit</x-table-edit-column>
                    </tr>
                    @endforeach
                    @endif
                </x-table>
            </div>
            <div class="col-span-2">
                <x-table subject="Agencies" description="" button="Add Agency" route="{{route('agencies.create')}}">
                    <x-slot name="tableHeader">
                        <x-table-bold-header>Name</x-table-bold-header>
                        <x-table-header>Address</x-table-header>
                        <x-table-header>Phone</x-table-header>
                        <x-table-edit-header></x-table-edit-header>
                    </x-slot>
                    @if(isset($agencies->first()->id))
                    @foreach ($agencies as $agency)    
                    <tr>
                        <x-table-bold-header>{{$agency->name}}</x-table-bold-header>
                        <x-table-column>{{$agency->address}}</x-table-column>
                        <x-table-column>{{$agency->phone}}</x-table-column>
                        <x-table-edit-column route="{{route('agencies.edit', $agency)}}">Edit</x-table-edit-column>
                    </tr>
                    @endforeach
                    @endif
                </x-table>
            </div>
            <div class="col-span-4 border-t-2 mt-8 pt-4">
                <x-table subject="Parts" description="" button="Add Part" route="{{route('parts.create')}}">
                <x-slot name="tableHeader">
                    <x-table-bold-header>Part Name</x-table-bold-header>
                    <x-table-header>Duration</x-table-header>
                    <x-table-edit-header></x-table-edit-header>
                </x-slot>
                @if(isset($parts->first()->id))
                @foreach ($parts as $part)    
                <tr>
                    <x-table-bold-header>{{$part->name}}</x-table-bold-header>
                    <x-table-column>{{$part->duration}}</x-table-column>
                    <x-table-edit-column route="{{route('parts.edit', $part)}}">Edit</x-table-edit-column>
                </tr>
                @endforeach
                @endif
            </x-table>
            </div>
        </div>
</x-app-layout>