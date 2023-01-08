<?php

use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Properties Api endpoints
Route::get('/property/{property}/certificate', [PropertyController::class, 'certificatesProperty']);
Route::apiResource('property', PropertyController::class);

//Certificates Api Endpoints
Route::apiResource('certificate', CertificateController::class)->only(['index', 'store', 'show']);

//Notes Api Endpoints
Route::post('/property/{property}/note', [NoteController::class, 'createNoteProperty']);
Route::post('/certificate/{certificate}/note', [NoteController::class, 'createNoteCertificate']);
Route::get('/property/{property}/note', [NoteController::class, 'getPropertysNote']);
Route::get('/certificate/{certificate}/note', [NoteController::class, 'getCertificatesNote']);


