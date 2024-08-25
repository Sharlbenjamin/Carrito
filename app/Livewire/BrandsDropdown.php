<?php

namespace App\Livewire;

use Livewire\Component;

class BrandsDropdown extends Component
{
    public $types;
    
    public function render()
    {
        return view('livewire.brands-dropdown');
    }
}
