<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Certificate;
use App\Models\Property;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{
    public function createNoteProperty(Property $property, NoteRequest $request):JsonResponse
    {
        $property->notes()->create($request->validated());

        return response()->json([
            "success" => true,
            "message" => "Note created for Property successfully.",
        ]);
    }

    public function createNoteCertificate(Certificate $certificate, NoteRequest $request):JsonResponse
    {
        $certificate->notes()->create($request->validated());

        return response()->json([
            "success" => true,
            "message" => "Note created for Certificate successfully.",
        ]);
    }

    public function getPropertysNote(Property $property):NoteResource
    {
        return new NoteResource($property);
    }

    public function getCertificatesNote(Certificate $certificate):NoteResource
    {
        return new NoteResource($certificate);
    }



}
