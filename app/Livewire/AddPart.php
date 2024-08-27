<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Part;
use App\Models\RepairPart;

class AddPart extends Component
{
    public $cost = 0;
    public $part;
    public $index;

    protected $listeners = ['RepairAdded' => 'Create'];

    public function mount($cost = 0, $part, $index)
        {
            $this->cost = $cost;	
            $this->part = $part;	
            $this->index = $index;	
        }

    public function render()
    {
        $parts = Part::all();

        return view('livewire.add-part', compact('parts'));
    }

    public function updated()
    {
        return $this->dispatch('CostUpdated', $this->cost, $this->index);
    }

    public function Create($repair)
    {
        $part = RepairPart::create([
            'repair_id' => $repair['id'],
            'part_id' => $this->part,
            'cost' => $this->cost
        ]);

        $invoice = RepairPart::where('repair_id', $part->repair->id)->sum('cost');

        $part->repair->update([
            'invoice' => $invoice
        ]);
        $part->repair->save();
    }

    public function RemovePart()
    {
        return dd($this->cost, $this->parts_number);
    }
}
