<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PetCollection;
use App\Models\Pet;
use Illuminate\Http\Request;
use App\Http\Resources\Pet as PetResource;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Pet $pet)
    {
        $pets = $pet->all();
        return response()->json(new PetCollection($pets), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $pet = new Pet();
        $pet->fill($request->all());
        $pet->save();

        return response()->json(new PetResource($pet), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Pet $pet)
    {
        return response()->json(new PetResource($pet), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Pet $pet)
    {
        $pet->fill($request->all());
        $pet->save();

        return response()->json(new PetResource($pet), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return response()->json([], 200);
    }
}
