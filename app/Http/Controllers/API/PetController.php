<?php

namespace App\Http\Controllers\API;

use App\Models\Pet;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pet $pet)
    {
        return $pet->all()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required|min:2',
            'specie' => ['required', 
                Rule::in(['C', 'G'])    
            ],
        ]);

        $pet->name = $request->name;
        $pet->specie = $request->specie;
        $pet->save();

        return response('success', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        return $pet->toJson();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pet = Pet::find($id);
        if(!$pet)
            return response('404 not found', 404);

        $pet->delete();

        return response('deleted', 200);
    }
}
