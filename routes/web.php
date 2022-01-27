<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\CommentController;
use App\Models\Reservation;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('detail');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', [ShopController::class, 'index']);

Route::get('/search', [ShopController::class, 'search']);

Route::get('/detail/{shop_id?}', [ShopController::class, 'detail']);

Route::post('/reserve', [ReservationController::class, 'reserve']);

Route::get('/like/{shop_id}', [LikeController::class, 'like']);

Route::get('/unlike/{shop_id}', [LikeController::class, 'unlike']);

Route::get('/mypage', [MypageController::class, 'mypage']);

Route::post('/reserve/update', [ReservationController::class, 'update']);

Route::post('/reserve/delete', [ReservationController::class, 'delete']);

Route::post('/comment', [CommentController::class, 'comment']);

