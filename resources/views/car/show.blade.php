<x-app-layout>
    <x-slot name="header">
        {{$car->name}} Details
    </x-slot>
    <div class="grid grid-cols-12">
        <div class="col-span-6">
            <x-table subject="Maintenance for {{$car->name}}" description="All of the maintenance done for the {{$car->name}} Car" button="Add Maintenance" route="{{route('repairs.create', ['car' => $car])}}">
                <x-slot name="tableHeader">
                    <x-table-header>Agency Name</x-table-header>
                    <x-table-header>Maintenance Date</x-table-header>
                    <x-table-header>Total Invoice</x-table-header>
                    <x-table-edit-header></x-table-edit-header>
                </x-slot>
                @if (isset($car->repairs->first()->id))
                    @foreach ($car->repairs as $repair)
                    <tr>
                        <x-table-column>{{$repair->agency->name}}</x-table-column>
                        <x-table-column>{{$repair->date}}</x-table-column>
                        <x-table-column>{{$repair->invoice}}</x-table-column>
                        <x-table-edit-column route="{{route('repairs.edit', $repair)}}">Edit</x-table-edit-column>
                    </tr>
                    @endforeach
                @endif
            </x-table>
        </div>
    </div>
</x-app-layout>