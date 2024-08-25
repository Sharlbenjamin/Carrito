<x-app-layout>
    <x-slot name="header">
        Create Agency
    </x-slot>
    <div class="grid grid-cols-6">
        <div class="col-span-2">
            @isset($agency->id)
            <form action="{{route('agencies.updaet', $agency)}}" method="POST">
                @method=('PUT')
            @else
            <form action="{{route('agencies.store')}}" method="POST">
            @endisset
                @csrf
               {{-- name --}}
               <div class="mt-4">
                <x-label class="mb-2">Agency Name</x-label>
                <x-input name="name" class="w-full" value="{{isset($agency->id) ? $agency->name : ''}}"></x-input>
                @error('name')
                {{$message}}
                @enderror
               </div>
               {{-- address --}}
               <div class="mt-4">
                <x-label class="mb-2">Agency Addres</x-label>
                <x-input name="address" class="w-full" value="{{isset($agency->id) ? $agency->addres : ''}}"></x-input>
                @error('addres')
                {{$message}}
                @enderror
               </div>
               {{-- phone --}}
               <div class="mt-4">
                <x-label class="mb-2">Agency Phone</x-label>
                <x-input name="phone" class="w-full" value="{{isset($agency->id) ? $agency->phone : ''}}"></x-input>
                @error('phone')
                {{$message}}
                @enderror
               </div>
               <div class="mt-4 flex justify-end space-x-4">
                @isset($agency->id)
                <x-submit-button>Update</x-submit-button>
                @else
                <x-submit-button>Submit</x-submit-button>
                @endisset
                <a href="{{url()->previous()}}">
                    <x-cancel-button type="button">Cancel</x-cancel-button>
                </a>
               </div>
               @isset($agency->id)
               <x-cancel-button class="w-full" type="button">Cancel</x-cancel-button>
               @endisset
            </form>
        </div>
    </div>
</x-app-layout>