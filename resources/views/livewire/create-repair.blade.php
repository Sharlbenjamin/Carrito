<div class="">
    <div class="mt-4">
        <x-label>Agency Name</x-label>
        <select wire:model.live="agency" class="w-full rounded-md border-gray-200 border-2">
            <option value="">Select Agency</option>
            @foreach($agencies as $agency)
            <option value="{{$agency->id}}">{{$agency->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-4">
        <x-label>Maintenance Date</x-label>
        <input type="date" wire:model.live="date" class="w-full rounded-md border-gray-200 border-2">
    </div>
    <input type="hidden" wire:model.live="parts_number">
    <div class="mt-4 flex justify-center">
        <h2 class="text-xl font-bold">Maintenance Parts</h2>
    </div>{{$parts_number}}
    @for ($parts_number; $parts_number > 0; $parts_number--)
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
            <x-input wire:model.live="PartCost{{$parts_number}}" name="" value=""></x-input>
        </div>
        <div class="mt-10 justify-end flex">
            <x-danger-button wire:click="RemovePart">Remove</x-danger-button>
        </div>
    </div>
    @endfor
    <div class="mt-4">
        <x-button type="button" class="w-full justify-center" wire:click="AddPart">Add Part</x-button>
    </div>
    <div class="mt-4 flex ">
        <h2 class="font-bold text-2xl">Total</h2>
        <div class="w-full mt-4"></div>
        <h2 class="font-bold text-2xl ml-4">{{$invoice}}</h2>
        <h2 class="font-bold text-2xl ml-1">LE</h2>
    </div>
    <div class="mt-2 flex justify-end">
        <div class="w-full border-t border-gray-300"></div>
    </div>
    <div class="mt-4 flex justify-end space-x-2">
        <x-submit-button type="button" wire:click="Submit">Submit</x-submit-button>
        <x-cancel-button type="button" wire:click="DeleteRepair">Cancel</x-cancel-button>
    </div>
    
</div>
<!-- 
On Clicking Add Maintenance 
1. Create Maintenence with Agency and date either null or not.
2. Pass the Repair/ Maintenance id.
3. create an array of parts.

on Clicking add Part
1. Append to the Parts array another part.

On Clicking x-cancel-button
1. Delete The Fake Maintenence created.
2. route to show  -->

