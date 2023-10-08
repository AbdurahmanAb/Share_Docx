<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::get('/users', [UserController::class, 'index']);
// Route::get('/user/{id}', function (User $id) {
//     return  $id; 
//  });

//  Route::post('/user', function() {
//     return new Illuminate\Http\Response([
//         'data' => 'post request'
//     ], 200, [
//         'Content-Type' => 'application/json'
//     ]);
// });
// Route::patch('user/{user}', function(User $user){
// return new Illuminate\Http\Response([
//     'data'=> 'patched'],
//    200, [
//     'Content-Tyepe'=>
//    ' application/json'
//    ]
//    );
// } );
// Route::delete('user/{user}', function(User $user){
//     return new Illuminate\Http\Response([
//         'data'=> 'deleted'],
//        200, [
//         'Content-Tyepe'=>
//        ' application/json'
//        ]
//        );
//     } );

// Route::apiResource('/users', UserController::class);

Route::prefix('v1')->group(
function(){
    $v1FolderPath = base_path('routes/api/v1');
$v1Files = glob($v1FolderPath . '/*.php');
    foreach ($v1Files as $file) {
        require $file;
    }
}
);


// Route::prefix('v1')->group(
//     function () {
//         require __DIR__ . '/api/v1/user.php';
//     }
// );


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
