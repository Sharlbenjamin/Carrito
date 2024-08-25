@props(['disabled' => false, 'update' => $update, 'submit' => $submit, 'cancel' => $cancel, 'route' => $route])
<div class="mt-4 flex justify-end space-x-2">
    @if(isset($car->id))
    <x-submit-button>Update</x-submit-button>
    @else
    <x-submit-button>Submit</x-submit-button>
    @endif
    <a href="">
        <x-cancel-button type="button">Cancel</x-cancel-button>
    </a>
    
</div>