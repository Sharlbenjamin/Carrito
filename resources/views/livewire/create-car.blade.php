<div class="grid grid-cols-6">
    <div class="col-span-3">
            {{-- name --}}
            <div class="mt-4 grid grid-cols-3">
                <x-label for="name" class="mt-3 col-span-1">Car Name</x-label>
                <div class="col-span-2">
                    <x-input class="w-full col-span-2" wire:model.live="name" name="namme" value=""></x-input>
                </div>
            </div>
                  <div class="w-full border-t border-gray-300 mt-4"></div>
            {{-- brand_id --}}
            <div class="mt-4 grid grid-cols-3">
                <x-label for="brand_id" class="mt-3 col-span-1">Car Brand</x-label>
                <div class="col-span-2">
                 <select name="brand_id" wire:model.live="brand_id" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    @if (isset($car->brand_id))
                    <option value="{{$car->brand->name}}">{{$car->brand->name}}</option>
                    @else
                    <option value="">Select Car Brand</option>
                    @endif
                    @foreach ($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                 </select>
                </div>
            </div>
            {{-- Dropdown --}}
            <div class="w-full border-t border-gray-300 mt-4"></div>
            {{-- type_id --}}
            <div class="mt-4 grid grid-cols-3">
                <x-label for="type_id" class="mt-3 col-span-1">Car Type</x-label>
                <div class="col-span-2">
                    @if ($brand_id != "" or $brand_id == !null)
                    <select name="type_id" wire:model.live="type_id" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @if (isset($car->type_id))
                        <option value="{{$car->type->name}}">{{$car->type->name}}</option>
                        @else
                        <option value="">Select Car Type</option>
                        @endif
                        @foreach ($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                    @else
                    <x-input type="text" name="" value="" disabled class="w-full bg-gray-200 cursor-not-allowed" placeholder="Select Car Brand First"> </x-input>
                    @endif
                </div>
            </div>
            <div class="w-full border-t border-gray-300 mt-4"></div>
            {{-- Year --}}
            <div class="mt-4 grid grid-cols-3">
                <x-label for="year" class="mt-3 col-span-1">Car Year</x-label>
                <div class="col-span-2">
                    <x-input class="w-full col-span-2" wire:model.live="year" name="yeaar" value="{{isset($car->id) ? $car->Year : ''}}"></x-input>
                </div>
            </div>
            <div class="w-full border-t border-gray-300 mt-4"></div>
            {{-- Kilometers --}}
            <div class="mt-4 grid grid-cols-3">
                <x-label class="mt-3 col-span-1">Car Kilometers</x-label>
                <div class="col-span-2">
                    <x-input class="w-full col-span-2" wire:model.live="kilometers" name="kilometers" value="{{isset($car->id) ? $car->Kilometers : ''}}"></x-input>
                </div>
            </div>
            <div class="mt-4 flex justify-end space-x-2">
                @if(isset($car->id))
                <x-submit-button wire:click="UpdateCar">Update</x-submit-button>
                @else
                <x-submit-button wire:click="CreateCar">Submit</x-submit-button>
                @endif
                <a href="{{url()->previous()}}">
                    <x-cancel-button type="button">Cancel</x-cancel-button>
                </a>
                @if(isset($car->id))
                <x-cancel-button wire:click="DeleteCar">Delete</x-cancel-button>
                @endif
            </div>
    </div>
</div>