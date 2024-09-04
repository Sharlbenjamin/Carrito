<x-app-layout>
    <x-slot name="header">
        Cars
    </x-slot>
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <x-table subject="Your Cars" description="List of all of your Cars" button="New Car" route="{{route('cars.create')}}">
                <x-slot name="tableHeader">
                    <x-table-bold-header>Name</x-table-bold-header>
                    <x-table-header>Brand</x-table-header>
                    <x-table-header>Type</x-table-header>
                    <x-table-header>Year</x-table-header>
                    <x-table-header>Kilometers</x-table-header>
                    <x-table-edit-header></x-table-edit-header>
                </x-slot>
                @isset($cars->first()->id)
                @foreach ($cars as $car)
                <tr>
                    <x-table-bold-column>
                        <a href="{{route('cars.show', $car)}}">
                            {{$car->name}}
                        </a>
                    </x-table-bold-column>
                    <x-table-column>{{$car->brand->name}}</x-table-column>
                    <x-table-column>{{$car->type->name}}</x-table-column>
                    <x-table-column>{{$car->year}}</x-table-column>
                    <x-table-column>{{$car->kilometers}}</x-table-column>
                    <x-table-edit-column route="{{route('cars.edit', $car)}}">Edit</x-table-edit-column>
                </tr>
                @endforeach
                @endisset
            </x-table>
        </div>
    </div>
</x-app-layout>