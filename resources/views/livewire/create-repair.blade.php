<div class="" x-data="{total:1}">
    <div class="mt-4">
        <x-label>Agency Name</x-label>
        <select wire:model.live="agency" class="w-full rounded-md border-gray-200 border-2">
            @if (isset($repair->id))
            <option value="{{$this->repair->agency->id}}">{{$this->repair->agency->name}}</option>
            @else
            <option value="">Select Agency</option>
            @endif
            @foreach($agencies as $agency)
            <option value="{{$agency->id}}">{{$agency->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-4">
        <x-label>Maintenance Date</x-label>
        <input type="date" wire:model.live="date" class="w-full rounded-md border-gray-200 border-2" value="{{$date}}">
    </div>
    <input type="hidden" wire:model.live="parts_number">
    <div class="mt-4 flex justify-center">
        <h2 class="text-xl font-bold">Maintenance Parts</h2>
    </div>
    @foreach($parts as $index => $part)
        @livewire('add-part',['index' => $index, 'id' => $part['id'], 'cost' => $part['cost'], 'part' => $part['part']], key($index))
    @endforeach
    <div class="mt-4">
        <x-button type="button" class="w-full justify-center" wire:click="addPart">Add Part</x-button>
    </div>
    <div class="mt-4 flex ">
        <h2 class="font-bold text-2xl">Total</h2>
        <div class="w-full mt-4"></div>
        <h2 class="font-bold text-2xl ml-4">{{$total}}</h2>
        <h2 class="font-bold text-2xl ml-1">LE</h2>
    </div>
    <div class="mt-2 flex justify-end">
        <div class="w-full border-t border-gray-300"></div>
    </div>
    <div class="mt-4 flex justify-end space-x-2">
        @if (isset($repair->id))
        <x-submit-button type="button" wire:click="Update">Update</x-submit-button>
        @else
        <x-submit-button type="button" wire:click="Submit">Submit</x-submit-button>
        @endif
        <x-cancel-button type="button" wire:click="DeleteRepair">Cancel</x-cancel-button>
    </div>
    @if (isset($repair->id))
        <x-cancel-button wire:click="RepairDelete">Delete</x-cancel-button>
    @endif
    </div>
</div>