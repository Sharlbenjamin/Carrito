<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Agency;
use App\Models\Repair;
use App\Models\Part;
use App\Models\RepairPart;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;



class CreateRepair extends Component
{
    public $agencies;
    public $AllParts;
    public $car;

    public $repair;
    public $repairParts = [];
    public $agency;
    public $date;
    public $total;

    public $parts = [];


    public $listeners = [
        'CostUpdated' => 'CalculateInvoice',
        'RemovePart' => 'RemoveItem'
    ];

    public function mount()
    {
        if (isset($this->repair->id)) {
            $this->total = $this->repair->invoice;
            $this->date = Carbon::parse($this->repair->date)->format('Y-m-d');
            $this->agency = $this->repair->agency->id;
            $this->repairParts = RepairPart::where('repair_id', $this->repair->id)->get();
            foreach ($this->repairParts as $part) {
                $this->addPart($part->part_id, $part->cost);
            }
        }
    }

    public function addPart($part = NULL, $cost = NULL)
    {
        $this->parts[] = [
            'part' => $part, // fix it
            'cost' => $cost
        ];
    }

    public function RemoveItem($index)
    {
        unset($this->parts[$index]);
        $this->parts = array_values($this->parts);
        $this->calculateTotal();
        return;
    }

    public function CalculateInvoice($cost, $index)
    {
        $this->parts[$index]['cost'] = $cost;
        $this->calculateTotal();
    }

    public function updated()
    {
        return $this->CalculateTotal();
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
            'agency_id' => $this->agency,
            'car_id' => $this->car->id,
            'date' => $this->date,
        ]);

        $this->dispatch('RepairAdded', $this->repair);

        return redirect()->route('cars.show', $this->car);
    }

    public function Update()
    {
        $this->repair = Repair::find($this->repair->id);
        $this->repair->update([
            'agency_id' => $this->agency,
            'car_id' => $this->car->id,
            'date' => $this->date,
        ]);

        $this->SyncParts($this->repair->id);
        //$this->dispatch('RepairUpdated', $this->repair->id);

        //return redirect()->route('cars.show', $this->car);
    }

    public function SyncParts($theRepairId)
    {
        $theRepair = Repair::find($theRepairId);
        $theRepair->parts()->detach();

        $oldParts = $theRepair->repairparts;

        foreach ($oldParts as $part) {
            $part->delete();
        }

        $this->dispatch('RepairAdded', $this->repair);

        return redirect()->route('cars.show', $this->car);
    }
}
