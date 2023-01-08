<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Http\Resources\PropertyResource;
use App\Models\property;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index():ResourceCollection
    {
        return PropertyResource::collection(Property::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PropertyRequest $request
     * @return JsonResponse
     */
    public function store(PropertyRequest $request):JsonResponse
    {

        Property::create($request->validated());

        return response()->json([
            "success" => true,
            "message" => "Property stored successfully.",
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  Property  $property
     * @return PropertyResource
     */
    public function show(Property $property):PropertyResource
    {
        return new PropertyResource($property);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param PropertyRequest $request
     * @param property $property
     * @return JsonResponse
     */
    public function update(PropertyRequest $request, Property $property):JsonResponse
    {
        $property->update($request->validated());

        return response()->json([
            "success" => true,
            "message" => "Property updated successfully.",
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(Property $property):JsonResponse
    {
        $property->delete();

        return response()->json(['Data' => 'Property Deleted Successfully', 204]);

    }

    /**
     * Returns the certificates for specific Property.
     *
     * @param property $property
     * @return JsonResponse
     */
    public function certificatesProperty(Property $property): JsonResponse
    {
        return response()->json(['Data' => $property->certificates]);
    }

}
