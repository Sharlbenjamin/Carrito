<div class="">

    <div class="flex space-x-2">
        <div class="mt-4 w-full">
            <x-label>Patrt Name {{$selectedPart}}</x-label>
            <select wire:model.live="part" class="w-full border-gray-200 border rounded-md border-2">
                @if (isset($part->id))
                    <option value="{{$part->part->id}}">{{$part->part->name}}</option>
                    @foreach ($parts as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                @else
                    <option value="">Select Part</option>
                    @foreach ($parts as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="mt-4 w-full">
            <x-label>Part Cost</x-label>
            <x-input type="number" wire:model.live="cost" name="" value=""></x-input>
        </div>
        <div class="mt-10 justify-end flex">
            <x-danger-button wire:click="RemovePart({{$index}})">Remove</x-danger-button>
        </div>
    </div>
</div>