<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Certificate;
use App\Models\Property;

class NoteController extends Controller
{
    public function createNoteProperty(Property $property, NoteRequest $request)
    {
        $property->notes()->create($request->validated());

        return response()->json([
            "success" => true,
            "message" => "Note created for Property successfully.",
        ]);
    }

    public function createNoteCertificate(Certificate $certificate, NoteRequest $request)
    {
        $certificate->notes()->create($request->validated());

        return response()->json([
            "success" => true,
            "message" => "Note created for Certificate successfully.",
        ]);
    }

    public function getPropertysNote(Property $property)
    {
        return new NoteResource($property);
    }

    public function getCertificatesNote(Certificate $certificate)
    {
        return new NoteResource($certificate);
    }



}
