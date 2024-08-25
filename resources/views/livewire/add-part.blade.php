<div class="">

    <div class="flex space-x-2">
        <div class="mt-4 w-full">
            <x-label>Patrt Name</x-label>
            <select wire:model.live="CreateParts" class="w-full border-gray-200 border rounded-md border-2">
                <option value="">Select Part</option>
                @foreach ($parts as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4 w-full">
            <x-label>Part Cost</x-label>
            <x-input wire:model.live="cost" name="" value=""></x-input>
        </div>
        <div class="mt-10 justify-end flex">
            <x-danger-button wire:click="RemovePart">Remove</x-danger-button>
        </div>
    </div>
</div>