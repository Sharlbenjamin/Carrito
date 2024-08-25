<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Agency;
use App\Models\Repair;
use App\Models\Part;
use Carbon\Carbon;

class CreateRepair extends Component
{
    public $car;
    public $agencies;
    public $repair;
    public $agency;
    public $date;
    public $invoice;

    public $parts;
    public $parts_number;
    public $CreateParts = [];
    public $cost;

    public $PartName = [];
    public $PartCost = [];

    public $listeners = ['CostUpdated' => 'CalculateInvoice'];
    public function render()
    {
        $this->agencies = Agency::all();
        $this->parts = Part::all();

        return view('livewire.create-repair');
    }

    public function DeleteRepair()
    {
        return redirect()->route('cars.show', $this->car);
    }

    public function updated()
        {
            foreach($this->parts_number as $number){
                $this->PartCost = array_append($this->PartCost, $number);
            }
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

    public function AddPart()
    {
        return $this->parts_number++;
    }

    public function RemovePart()
    {
        return $this->parts_number--;
    }

    public function CalculateInvoice($costs)
        {
            // $this->invoice = $cost;
            dD($costs);

            $invoice = array_sum($costs);

            return dd($invoice);
        }
}
