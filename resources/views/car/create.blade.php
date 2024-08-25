<x-app-layout>
    <x-slot name="header">
        Add Your Car
    </x-slot>
    @if (isset($car))
    @livewire('create-car', ['car' => $car])
    @else
    @livewire('create-car')
    @endif
</x-app-layout>