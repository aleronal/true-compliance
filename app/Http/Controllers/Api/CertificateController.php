<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificateRequest;
use App\Http\Resources\CertificateResource;
use App\Models\Certificate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index():AnonymousResourceCollection
    {
        return CertificateResource::collection(Certificate::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CertificateRequest $request
     * @return JsonResponse
     */
    public function store(CertificateRequest $request):JsonResponse
    {
        Certificate::create($request->validated());

        return response()->json([
            "success" => true,
            "message" => "Certificate stored successfully.",
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return CertificateResource
     */
    public function show(Certificate $certificate):CertificateResource
    {
        return new CertificateResource($certificate);
    }


}
