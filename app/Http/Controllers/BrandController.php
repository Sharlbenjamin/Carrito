<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function create(Request $request): View
    {
        return view('brand.create');
    }

    public function store(BrandStoreRequest $request): RedirectResponse
    {
        $brand = Brand::create($request->validated());

        // $request->session()->flash('brand.id', $brand->id);

        return redirect()->route('enums');
    }

    public function edit(Request $request, Brand $brand): View
    {
        return view('brand.create', compact('brand'));
    }

    public function update(BrandUpdateRequest $request, Brand $brand): RedirectResponse
    {
        $brand->update($request->validated());

        // $request->session()->flash('brand.id', $brand->id);

        return redirect()->route('brands.index');
    }
}
