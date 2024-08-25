<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Type;
use App\Models\Brand;
use App\Models\Part;

class EnumsIndex extends Controller
{
    public function index()
        {
            $brands = Brand::all();
            $types = Type::all();
            $agencies = Agency::all();
            $parts = Part::all();

            return view('enums.index', compact('types', 'brands', 'agencies', 'parts'));	
        }
}
