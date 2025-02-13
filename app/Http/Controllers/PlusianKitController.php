<?php

namespace App\Http\Controllers;

use App\Models\PlusianKit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PlusianKitController extends Controller
{
    public function index()
    {
        $kits = PlusianKit::all();
        return view('plusian-kits.index', compact('kits'));
    }

    public function create()
    {
        return view('plusian-kits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        $slug = Str::slug($request->title);

        PlusianKit::create([
            'title' => $request->title,
            'slug' => $slug,
            'link' => $request->link,
        ]);

        return redirect()->route('plusian-kits.index')->with('success', 'Plusian Kit created successfully!');
    }

    public function edit($id)
    {
        $kit = PlusianKit::findOrFail($id);
        return view('plusian-kits.edit', compact('kit'));
    }

    public function update(Request $request, $id)
    {
        $kit = PlusianKit::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        $slug = Str::slug($request->title);

        $kit->update([
            'title' => $request->title,
            'slug' => $slug,
            'link' => $request->link,
        ]);

        return redirect()->route('plusian-kits.index')->with('success', 'Plusian Kit updated successfully!');
    }

    public function destroy($id)
    {
        $kit = PlusianKit::findOrFail($id);
        $kit->delete();

        return redirect()->route('plusian-kits.index')->with('success', 'Plusian Kit deleted successfully!');
    }
}

