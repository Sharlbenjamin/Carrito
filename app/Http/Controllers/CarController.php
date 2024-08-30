<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Type;
use App\Models\Part;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarController extends Controller
{
    public function index(Request $request): View
    {
        $user = Auth::user();
        $cars = Car::where('user_id', $user->id)->get();

        return view('car.index', compact('cars'));
    }

    public function create(Request $request): View
    {
        $brands = Brand::all();
        $types = Type::all();
        $user = Auth::User();

        return view('car.create', compact('types', 'brands', 'user'));
    }

    public static function store(CarStoreRequest $request): RedirectResponse
    {
        $car = Car::create($request->validated());

        return redirect()->route('cars.index');
    }

    public function edit(Request $request, Car $car): View
    {
        return view('car.create', compact('car'));
    }

    public static function update(CarUpdateRequest $request, Car $car): RedirectResponse
    {
        $car->update([
            'name' => $car->name, 
            'brand_id' => $car->brand_id, 
            'type_id' => $car->type_id, 
            'year' => $car->year, 
            'kilometer' => $car->kilometer, 
            'license_date' => $car->license_date, 
            'license' => $car->license, 
            'l_r_t' => $car->l_r_t
        ]);

        $car->save();

        return redirect()->route('car.index');
    }

    public function destroy(Request $request, Car $car): RedirectResponse
    {
        $car->delete();

        return redirect()->route('route:cars.index');
    }

    public function show(Request $request, Car $car): View
    {
        $brands = Brand::all();
        $types = Type::all();
        $parts = Part::all();

        // $repairs = Repair::where('car_id', $car->id)->get();


        return view('car.show', compact('brands', 'types', 'car', 'parts'));
    }
}
