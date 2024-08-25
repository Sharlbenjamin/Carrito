<x-app-layout>
    <x-slot name="header">
        Create Part
    </x-slot>
    <div class="grid grid-cols-6">
        <div class="col-span-2">
            @if (isset($part->id))
            <form action="{{route('parts.update', $part)}}" method="POST">
            @method('PUT')
            @else
            <form action="{{route('parts.store')}}" method="POST">
            @endif
            @csrf
            <div class="mt-4">
                <x-label class="mb-2">Part Name</x-label>
                <x-input name="name" class="w-full" value="{{isset($part->id) ? $part->name : ''}}"></x-input>
               </div>
               <div class="mt-4">
                <x-label class="mb-2">Duration</x-label>
                <x-input name="duration" class="w-full" value="{{isset($part->id) ? $part->duration : ''}}"></x-input>
               </div>
               <div class="mt-4 flex space-x-4 justify-end">
                @if (isset($part->id))
                <x-submit-button>Update</x-submit-button>
                @else
                <x-submit-button>Submit</x-submit-button>
                @endif
                <a href="{{url()->previous()}}">
                    <x-cancel-button type="button">Cancel</x-cancel-button>
                </a>
                @if (isset($part->id))
                <x-cancel-button type="button">Delete</x-cancel-button>
                @endif
               </div>
            </form>
        </div>
    </div>
</x-app-layout>