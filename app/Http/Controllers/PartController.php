<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartStoreRequest;
use App\Http\Requests\PartUpdateRequest;
use App\Models\Part;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartController extends Controller
{
    public function create(Request $request): View
    {
        return view('part.create');
    }

    public function store(PartStoreRequest $request): RedirectResponse
    {
        $part = Part::create($request->validated());

        // $request->session()->flash('part.id', $part->id);

        return redirect()->route('enums');
    }

    public function edit(Request $request, Part $part): View
    {
        return view('part.create', compact('part'));
    }

    public function update(PartUpdateRequest $request, Part $part): RedirectResponse
    {
        $part->update($request->validated());

        //$request->session()->flash('part.id', $part->id);

        return redirect()->route('enums');
    }
}
