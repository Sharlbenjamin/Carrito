<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Part;
use App\Models\RepairPart;

class AddPart extends Component
{
    public $CreateParts;
    public $cost;
    public $parts_number;

    protected $listeners = ['RepairAdded' => 'Create'];

    public function render()
    {
        $parts = Part::all();

        return view('livewire.add-part', compact('parts'));
    }

    public function updated()
        {
                $costs = $this->cost;
            return $this->dispatch('CostUpdated', $costs);
        }

    public function Create($repair)
    {
        return RepairPart::create([
            'repair_id' => $repair['id'],
            'part_id' => $this->CreateParts,
            'cost' => $this->cost
        ]);
    }

    public function RemovePart()
        {
            return ;	
        }
}
