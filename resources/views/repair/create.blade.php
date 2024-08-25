<x-app-layout>
    <x-slot name="header">
        Add repair to {{$car->name}}
    </x-slot>
    <div class="grid grid-cols-6">
        <div class="col-span-1"></div>
        <div class="col-span-4 p-4 border rounded-md">
            @livewire('create-repair', ['car' => $car])
        </div>
    </div>
</x-app-layout>