<x-app-layout>
    <x-slot name="header">
        Add Type to {{$brand->name}}
    </x-slot>
    <div class="grid grid-cols-6">
        <div class="col-span-3">
            @isset($type->id)
            <form action="{{route('types.update', $type)}}" method="POST">
                @method('PUT')
                @else
            <form action="{{route('types.store')}}" method="POST">
            @endisset
                @csrf
                <input type="hidden" value="{{isset($type->id) ? $type->brand_id: $brand->id}}" name="brand_id">
                <div class="mt-4 flex space-x-4">
                    <x-label class="pt-3">Type</x-label>
                    <x-input name="name" value="{{isset($type->id) ? $type->name: ''}}"></x-input>
                    @error('name') {{$message}} @enderror
                    <div class="mt-1 space-x-2">
                        @isset($type->id)
                        <x-submit-button>update</x-submit-button>
                        @else
                        <x-submit-button>Submit</x-submit-button>
                        @endisset
                        <a href="{{url()->previous()}}">
                            <x-cancel-button type="button">Cancel</x-cancel-button>
                        </a>
                        @isset($type->id)
                        <x-cancel-button>Delete</x-cancel-button>
                        @endisset
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>