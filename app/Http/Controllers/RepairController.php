<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepairStoreRequest;
use App\Http\Requests\RepairUpdateRequest;
use App\Models\Repair;
use App\Models\Car;
use App\Models\Agency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RepairController extends Controller
{
    public function create(Request $request): View
    {
        $agencies = Agency::all();

        $car = Car::find($request->car);

        return view('repair.create', compact('car', 'agencies'));
    }

    public function store(RepairStoreRequest $request): RedirectResponse
    {
        dd('ss');
        $repair = Repair::create($request->validated());

        return redirect()->route('repair.index');
    }

    public function destroy(Request $request, Repair $repair): RedirectResponse
    {
        $repair->delete();

        return redirect()->route('repairs.index');
    }

    public function edit(Request $request, Repair $repair): View
    {
        $agencies = Agency::all();
        $car = $repair->car;

        return view('repair.create', compact('car', 'agencies', 'repair'));
    }

    public function update(RepairUpdateRequest $request, Repair $repair): RedirectResponse
    {
        $repair->update([
            'agency_id' => $repair->agency_id, 
            'car_id' => $repair->car_id, 
            'date' => $repair->date, 
            'invoice' => $repair->invoice
        ]);

        $repair->save();

        return redirect()->route('repair.index');
    }
}
