<?php
use App\Http\Controllers\API\ProjectTestController;
use App\Models\Post;
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

// Route::get('/test', function(){
// return response()->json([
//     'success' => true,
//     'name' => 'mario'
// ]);

//     return Post::all();
// });

Route::get('/posts', [ProjectTestController::class, 'index']);
