<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgencyStoreRequest;
use App\Http\Requests\AgencyUpdateRequest;
use App\Models\Agency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgencyController extends Controller
{
    public function index(Request $request): View
    {
        $agencies = Agency::all();

        return view('agency.index');
    }

    public function create(Request $request): View
    {
        return view('agency.create');
    }

    public function store(AgencyStoreRequest $request): RedirectResponse
    {
        $agency = Agency::create($request->validated());

        return redirect()->route('enums');
    }

    public function edit(Request $request, Agency $agency): View
    {
        return view('agency.create', compact('agency'));
    }

    public function update(AgencyUpdateRequest $request, Agency $agency): RedirectResponse
    {
        $agency->update($request->validated());

        return redirect()->route('agency.index');
    }

    public function destroy(Request $request, Agency $agency): RedirectResponse
    {
        $agency->delete();

        return redirect()->route('agenct.index');
    }
}
