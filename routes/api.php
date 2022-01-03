<?php

    use App\Http\Controllers\APIController;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Sample API route    Vyuldashev\LaravelOpenApi\OpenApiServiceProvider::class,
Route::get('/profits', [\App\Http\Controllers\SampleDataController::class, 'profits'])->name('profits');

//begin:: API routes for the API controller ** VERSION 1 **
route::get('/v1/tractors', [APIController::class, 'getTractors'])->name('api.tractors.index');
Route::get('/v1/trailers', [APIController::class, 'getTrailers'])->name('api.trailers.index');
Route::get('/v1/ordertypes', [APIController::class, 'getOrderTypes'])->name('api.ordertypes.index');
//end:: API routes for the API controller ** VERSION 1 **


//begin:: Out of Organization API routes for the API controller ** VERSION 1 **
route::get('org/tractors', [APIController::class, 'getTractors'])->name('api.tractors.show');
