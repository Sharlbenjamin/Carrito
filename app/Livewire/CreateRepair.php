<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Agency;
use App\Models\Repair;
use App\Models\Part;
use App\Models\RepairPart;
use Carbon\Carbon;

class CreateRepair extends Component
{
    public $agencies;
    public $AllParts;
    public $car;

    public $repair;
    public $agency;
    public $date;
    public $total;

    public $parts = [];


    public $listeners = ['CostUpdated' => 'CalculateInvoice'];

    public function mount()
    {
        $this->date = $this->repair->date;
        $this->agency = $this->repair->agency;
        $this->addPart();
    }

    public function addPart()
    {
        $this->parts[] = [
            'part' => '',
            'cost' => ''
        ];
    }

    public function CalculateInvoice($cost, $index)
    {
        $this->parts[$index]['cost'] = $cost;
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = array_sum(array_column($this->parts, 'cost'));
    }

    public function render()
    {
        $this->agencies = Agency::all();
        $this->AllParts = Part::all();

        return view('livewire.create-repair');
    }

    public function RepairDelete()
    {
        $DeletedRepair = Repair::find($this->repair->id);

        foreach ($DeletedRepair->repairparts as $part) {
            $part->delete();
        }
        $DeletedRepair->delete();
        return redirect()->route('cars.show', $this->car);
    }

    public function DeleteRepair()
    {
        return redirect()->route('cars.show', $this->car);
    }

    public function Submit()
    {
        $this->repair = Repair::create([
            'agency_id' => Agency::first()->id,
            'car_id' => $this->car->id,
            'date' => $this->date,
        ]);

        $this->dispatch('RepairAdded', $this->repair);

        return redirect()->route('cars.show', $this->car);
    }
}
