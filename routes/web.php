<?php

use App\Mail\WelcomeMail;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\RoutePath;
use function Termwind\render;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/send', function () {
//   $user =User::factory()->make();
//     Mail::to($user)->send(new WelcomeMail($user));
//     return (new WelcomeMail($user))->render();
// });

Route::get('/app', function () {
  return view('app');
});
Route::get(RoutePath::for('password.reset', '/reset-password/{token}'), function ($token) {
  return view('auth.reset-password', [
    'token' => $token
  ]);
}) ->middleware(['guest:'.config('fortify.guard')])
->name('password.reset');
