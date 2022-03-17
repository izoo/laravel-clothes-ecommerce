<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\Auth\LoginController;

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
// MPESA END POINTS
Route::post('v1/access/token',[MpesaController::class,'generateAccessToken'])->name('v1/access/token');
Route::post('v1/token/stk/push',[MpesaController::class,'stkPushRequest'])->name('v1/token/stk/push');
Route::post('v1/hlab/validation',[MpesaController::class,'mpesaValidation'])->name('v1/hlab/validation');
Route::post('sendback/response/{id}/{order_no}',[MpesaController::class,'mpesaConfirmation'])->name('sendback/response');
Route::post('callback/wallet/{id}',[MpesaController::class,'mpesaConfirmationWallet'])->name('callback/wallet');
Route::get('userdetails/{id}',[MpesaController::class,'getUser']);

//Auth
Route::post('loginApi',[LoginController::class,'loginApi'])->name('loginApi');
/** Secure  EndPoint */
Route::middleware('auth:api')->group(function(){
    //Transctions Api
Route::get('allTransactions',[OrdersController::class,'allTransactions']);
Route::get('transactionByRange/{from}/{to}',[OrdersController::class,'allTransactionsByDate']);
Route::get('transactionByCategory/{category}',[OrdersController::class,'allTransactionsByCategory']);
//Users Api
Route::get('allUsers',[UserController::class,'index']);
Route::get('userById/{id}',[UserController::class,'userById']);
Route::get('userByGender/{gender}',[UserController::class,'userByGender']);
Route::get('userByLastPurchaseDate/{date}',[UserController::class,'userByLastPurchaseDate']);
Route::get('userByItemCategory/{item}/{category}',[UserController::class,'userByItemCategory']);
Route::get('usersPurchasedItem/{item}',[OrdersController::class,'userPurchasedItem']);
Route::get('usersPurchasedItemDate/{item}/{date}',[OrdersController::class,'usersPurchasedItemDate']);
Route::get('userByGenderLike/{gender}',[UserController::class,'userByGenderLike']);
Route::get('usersByLastLogin/{login_time}',[UserController::class,'UsersByLastLogin']);
Route::get('productByUser/{user}',[ProductsController::class,'ProductsByUser']);
Route::get('ProductsBySalesVolume',[ProductsController::class,'ProductsBySalesVolume']);


});

/**End Secure End Point */


//Products Api Insecure End Point
Route::get('productsAll',[ProductsController::class,'Products']);
Route::get('productsByCategory/{category}',[ProductsController::class,'ProductsByCategory']);
Route::get('ProductsByName/{name}',[ProductsController::class,'ProductsByName']);
Route::get('ProductsById/{id}',[ProductsController::class,'ProductsById']);





