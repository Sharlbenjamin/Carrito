<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeStoreRequest;
use App\Http\Requests\TypeUpdateRequest;
use App\Models\Type;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TypeController extends Controller
{
    public function create(Request $request): View
    {
        $brand = Brand::find($request->brand);

        return view('type.create', compact('brand'));
    }

    public function store(TypeStoreRequest $request, Brand $brand): RedirectResponse
    {

        $type = Type::create($request->validated());

        // $request->session()->flash('type.id', $type->id);

        return redirect()->route('enums');
    }

    public function edit(Request $request, Type $type): View
    {
        return view('type.edit', compact('type'));
    }

    public function update(TypeUpdateRequest $request, Type $type): RedirectResponse
    {
        $type->update($request->validated());

        // $request->session()->flash('type.id', $type->id);

        return redirect()->route('types.index');
    }
}
