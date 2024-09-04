<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Part;
use App\Models\RepairPart;
use App\Models\Repair;

class AddPart extends Component
{
    public $cost = 0;
    public $part;
    public $selectedPart;
    public $index;
    public $id;

    protected $listeners = [
        'RepairAdded' => 'Create',
        'RepairUpdated' => 'SyncParts', 
        'RemoveItem' => 'updated'
    ];

    // Synch Created and not Crated

    public function mount($cost = 0, $part, $index, $id)
    {
        $this->id = $id;
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
        if($this->cost == ''){
            return $this->dispatch('CostUpdated', 0, $this->index);
        }
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
        return $this->dispatch('RemovePart', $this->id);
    }
}
