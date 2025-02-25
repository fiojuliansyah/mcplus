<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\ClassPromo;
use Illuminate\Http\Request;

class ClassPromoController extends Controller
{
    public function index($slug)
    {
        $classroom = Classroom::where('slug', $slug)->firstOrFail();
        $promos = ClassPromo::where('classroom_id', $classroom->id)->get();

        return view('promos.index', compact('promos', 'classroom'));
    }

    public function create($slug)
    {
        $classroom = Classroom::where('slug', $slug)->firstOrFail();

        return view('promos.create', compact('classroom'));
    }

    public function store(Request $request, $slug)
    {
        $classroom = Classroom::where('slug', $slug)->firstOrFail();

        $promo = ClassPromo::create([
            'name' => $request->name,
            'normal_price' => $request->normal_price,
            'classroom_id' => $classroom->id,
            'discount_price' => $request->discount_price,
        ]);

        return redirect()->route('promos.index', ['slug' => $slug])->with('success', 'Promo created successfully.');
    }

    public function edit($slug, $id)
    {
        $classroom = Classroom::where('slug', $slug)->firstOrFail();
        $promo = ClassPromo::findOrFail($id);

        return view('promos.edit', compact('promo', 'classroom'));
    }

    public function update(Request $request, $slug, $id)
    {
        $classroom = Classroom::where('slug', $slug)->firstOrFail();
        $promo = ClassPromo::findOrFail($id);
        
        $promo->update([
            'name' => $request->name,
            'normal_price' => $request->normal_price,
            'classroom_id' => $classroom->id,
            'discount_price' => $request->discount_price,
        ]); 
        return redirect()->route('promos.index', ['slug' => $slug])->with('success', 'Time Table updated successfully.');
    }

    public function destroy($slug, $id)
    {
        $promo = ClassPromo::findOrFail($id);
        $promo->delete();

        return redirect()->route('promos.index', $slug)->with('success', 'Promo deleted successfully.');
    }
}
