<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Depense;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Depense::all();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'description' => 'required',
            'montant' => 'nullable',
            'date' => 'required',
            'categorie' => 'required',
        ]);

        $depense = Depense::create($validatedData);

        return response()->json($depense, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $depense = Depense::findOrFail($id);
        return response()->json($depense);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'description' => 'required',
            'montant' => 'nullable',
            'date' => 'required',
            'categorie' => 'required',
        ]);

        $depense = Depense::findOrFail($id);
        $depense->update($validatedData);

        return response()->json($depense);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $depense = Depense::findOrFail($id);
        $depense->delete();

        return response()->json(null, 204);
    }
}
