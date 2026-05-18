<?php

namespace App\Http\Controllers;

use App\Models\Chicken;
use Illuminate\Http\Request;

class ChickenController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $chickens = Chicken::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%$search%");
        })->paginate(5);

        return view('chickens.index', compact('chickens'));
    }

    public function create()
    {
        return view('chickens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'breed' => 'required',
            'origin' => 'required',
            'lifespan' => 'required|integer',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Chicken::create([
            'name' => $request->name,
            'breed' => $request->breed,
            'origin' => $request->origin,
            'lifespan' => $request->lifespan,
            'image' => $imageName
        ]);

        return redirect()->route('chickens.index');
    }

    public function show(Chicken $chicken)
    {
        return view('chickens.show', compact('chicken'));
    }

    public function edit(Chicken $chicken)
    {
        return view('chickens.edit', compact('chicken'));
    }

    public function update(Request $request, Chicken $chicken)
    {
        $request->validate([
            'name' => 'required',
            'breed' => 'required',
            'origin' => 'required',
            'lifespan' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('image')) {

            if ($chicken->image && file_exists(public_path('images/' . $chicken->image))) {
                unlink(public_path('images/' . $chicken->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $chicken->image = $imageName;
        }

        $chicken->update([
            'name' => $request->name,
            'breed' => $request->breed,
            'origin' => $request->origin,
            'lifespan' => $request->lifespan,
            'image' => $chicken->image
        ]);

        return redirect()->route('chickens.index')
            ->with('success', 'Chicken updated successfully!');
    }
}
