<x-app-layout>
    <x-slot name="header">
        Add Brand
    </x-slot>
    <div class="grid grid-cols-6">
        <div class="col-span-3">
            @isset($brand->id)
            <form action="{{route('brands.update', $brand)}}" method="POST">
                @method('PUT')
                @else
            <form action="{{route('brands.store')}}" method="POST">
                @endisset
                @csrf
                <div class="mt-4 flex space-x-4">
                    <x-label class="pt-3">Brand Name</x-label>
                    <x-input name="name" value="{{isset($brand->name) ? $brand->name : ''}}"></x-input>
                    <div class="mt-4 flex justify-end space-x-4 ">
                        @isset($brand->id)
                        <x-submit-button>Update</x-submit-button>
                        @else
                        <x-submit-button>Submit</x-submit-button>
                        @endisset
                        <a href="{{url()->previous()}}">
                            <x-cancel-button type="button">Cancel</x-cancel-button>
                        </a>
                    </div>
                </div>
                @isset($brand->id)
                <a href="">
                    <x-cancel-button class="mt-4 w-full" type="button">Delete</x-cancel-button>
                </a>
                @endisset
            </form>
        </div>
    </div>
</x-app-layout>