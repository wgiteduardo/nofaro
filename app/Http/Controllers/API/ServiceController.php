<?php

namespace App\Http\Controllers\API;

use App\Models\Service;
use App\Models\Pet;

use App\Http\Resources\Services as ServicesResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Service $service)
    {
        return new ServicesResource($service->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, Service $service)
    {
        $pet = Pet::find($id);

        if(!$pet)
            return response('pet not found', 404);

        $request->validate([
            'date' => 'required|date'
        ]);

        $service->pet_id = $pet->id;
        $service->date = $request->date;
        $service->description = $request->description;
        $service->save();

        return response('success', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($searchTerm, Pet $pet)
    {
        $pets = $pet->where('name', 'LIKE', '%'  . $searchTerm . '%')->get();

        foreach($pets as $pet) {
            $array[] = $pet->id;
        }
        
        return new ServicesResource(Service::whereIn('pet_id', $array)->paginate(10));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if(!$service)
            return response('404 not found', 404);

        $service->delete();

        return response('deleted', 200);
    }
}
