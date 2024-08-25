<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepairPartStoreRequest;
use App\Http\Requests\RepairPartUpdateRequest;
use App\Models\RepairPart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RepairPartController extends Controller
{
    public function create(Request $request): View
    {
        return view('repairpart.create', compact('repair'));
    }

    public function store(RepairPartStoreRequest $request): RedirectResponse
    {
        $repairpart = Repairpart::create($request->validated());

        return redirect()->route('repairpart.index');
    }

    public function edit(Request $request, RepairPart $repairPart): View
    {
        return view('repairpart.create', compact('repair', 'repairpart'));
    }

    public function update(RepairPartUpdateRequest $request, RepairPart $repairPart): RedirectResponse
    {
        $repairPart->update($request->validated());

        return redirect()->route('repairpart.index');
    }

    public function destroy(Request $request, RepairPart $repairPart): RedirectResponse
    {
        $repairPart->delete();

        return redirect()->route('repairpart.index');
    }
}
