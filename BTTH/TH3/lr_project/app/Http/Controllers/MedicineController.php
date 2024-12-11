<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicine;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $medicines = Medicine::all();
        return view("home", compact("medicines"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'form' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Medicine::create($validated);

        Medicine::create($request->all());
        return redirect()->route('medicines.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
