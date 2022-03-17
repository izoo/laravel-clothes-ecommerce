<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Auth\LoginController as Login;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\ApiController;

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
// Route::view('/admin','admin.dashboard.index');
Auth::routes();
Route::group(['prefix' => 'admin'],function(){
    Route::get('login', [LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class,'login'])->name('admin.login.post');
    Route::get('logout', [LoginController::class,'logout'])->name('admin.logout');
    Route::group(['middleware' => ['auth:admin']],function(){
        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');
        Route::get('prods',function(){
            return view('admin.dashboard.products');
        });
        Route::resource('categories',CategoryController::class);
        Route::resource('subcategories',SubcategoryController::class);
        Route::get('cats',function(){
            return view('admin.dashboard.categories');
        })->name('cats');
        Route::get('subcats',function(){
            return view('admin.dashboard.subcategories');
        })->name('subcats');
        Route::get('orders-payments',function(){
            return view('admin.dashboard.payments-orders');
        })->name('orders-payments');
        Route::get('api-users-list',function(){
            return view('admin.dashboard.new_api_users');
        })->name('api-users-list');
        Route::get('admin-users',function(){
           return view('admin.dashboard.users_list');
        })->name('admin-users');
        Route::get('users-logins',function(){
            return view('admin.dashboard.user_logins');
         })->name('users-logins');
        Route::get('user-tokens',function(){
            return view('admin.dashboard.api_tokens');
        })->name('user-tokens');
        Route::get('products-orders',function(){
            return view('admin.dashboard.purchases');
        })->name('products-orders');
        Route::get('payments-mpesa',function(){
            return view('admin.dashboard.mpesa_transactions');
        })->name('payments-mpesa');
        Route::get('stock-out',function(){
            return view('admin.dashboard.stock_out_alert');
        })->name('stock-out');
        Route::post('update_products',[ProductsController::class,'update'])->name('update_products');
        Route::post('update_category',[CategoryController::class,'update'])->name('update_category');
        Route::post('update_subcategory',[SubcategoryController::class,'update'])->name('update_subcategory');
        Route::post('update_user',[UserController::class,'update'])->name('update_user');
        Route::delete('products/{id}',[ProductsController::class,'destroy']);
        Route::get('orders',[OrdersController::class,'index'])->name('orders');
        Route::get('users_list',[UserController::class,'userAdmin'])->name('users_list');
        Route::get('users_logins',[Login::class,'userLogins'])->name('users_logins');
        Route::post('user_edit/{id}',[UserController::class,'userById']);
        Route::get('user_edit/{id}',[UserController::class,'userById']);
        Route::get('apiusers',[ApiController::class,'index'])->name('apiusers');
        Route::get('get_api_user',[ApiController::class,'getApiUser'])->name('get_api_user');
        Route::post('apiRegister',[ApiController::class,'register'])->name('apiRegister');
        Route::get('tokens',[ApiController::class,'tokens'])->name('tokens');
        Route::post('assignToken',[ApiController::class,'assignToken'])->name('assignToken');
        Route::get('productOrders',[OrdersController::class,'orderDetails'])->name('productOrders');
        Route::get('mpesaTransactions',[OrdersController::class,'mpesaTransactions'])->name('mpesaTransactions');
        Route::get('stockOut',[ProductsController::class,'stockOut'])->name('stockOut');
       
        
    });    
});

Route::group(['prefix' => 'user'],function(){
    Route::get('login', [Login::class,'showLoginForm'])->name('user.login');
    Route::post('login', [Login::class,'login'])->name('user.login.post');
    Route::post('logout', [Login::class,'logout'])->name('user.logout');
    Route::group(['middleware' => ['auth:user']],function()
    {
        Route::get('/',function(){
            return view('mbele.checkout');
        })->name('user.checkout');

        Route::get('userOrders',[OrdersController::class,'userOrders'])->name('userOrders');
        Route::get('usermpesaTransactions',[OrdersController::class,'usermpesaTransactions'])->name('usermpesaTransactions');
        Route::post('walletSum',[MpesaController::class,'walletSum'])->name('walletSum');
        Route::post('getUserReceipt',[OrdersController::class,'getUserReceipt'])->name('getUserReceipt');
       
    });
});

Route::resource('products',ProductsController::class);


Route::get('/', function () {
    return view('mbele.index');
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
})->name('home');

Route::get('/authentication',function () {

    return view('mbele.auth');

});
Route::post('/users_products',[ProductsController::class,'usersProducts'])->name('users_products');

Route::get('/subcats',[SubcategoryController::class,'subCategories'])->name('allSubcategories');
Route::get('/allProducts',[ProductsController::class,'Products'])->name('allProducts');

Route::get('/categs',[CategoryController::class,'Categories'])->name('allCategories');
Route::post('register_user',[UserController::class,'store'])->name('register_user');
Route::post('save-order',[OrdersController::class,'store'])->name('save-order');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


