<?php

namespace App\Livewire;

use App\Http\Controllers\CarController;
use Livewire\Component;
use App\Models\Brand;
use App\Models\Type;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CarStoreRequest;
use Illuminate\Support\Facades\Route;

class CreateCar extends Component
{
    public $car;
    public $name;
    public $brand_id;
    public $type_id;
    public $year;
    public $kilometers;
    public $user_id;

    public function render()
    {
        $brands = Brand::all();

        $types = Type::where('brand_id', $this->brand_id)->get();

        return view('livewire.create-car', compact('brands', 'types'));
    }

    public function mount()
        {
            if ($this->car != null) {

                $this->name = $this->car->name;
                $this->brand_id = $this->car->brand_id;
                $this->type_id = $this->car->type_id;
                $this->year = $this->car->year;
                $this->kilometers = $this->car->kilometers;
            }
            return ;	
        }

    public function CreateCar()
    {
        $rules = CarStoreRequest::createRules();
        $this->user_id = Auth::user()->id;

        $validatedAttributes = $this->validate($rules);

        $car = Car::create($validatedAttributes);

        return redirect()->route('cars.index');
    }

    public function UpdateCar()
    {
        $rules = CarStoreRequest::createRules();
        $this->user_id = Auth::user()->id;

        $validatedAttributes = $this->validate($rules);
        

        $car = Car::find($this->car->id);

        $car->update($validatedAttributes);

        return redirect()->route('cars.index');
    }
    public function DeleteCar()
    {
        $car = Car::find($this->car->id);

        $car->delete();

        return redirect()->route('cars.index');
    }
}
