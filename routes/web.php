<?php

use App\Models\District;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UnionController;
use App\Http\Controllers\Backend\WardNoController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UpazilaController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\VillageController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    //  manage user route
    Route::prefix('users')->group(function () {
        Route::get('/view', [UserController::class, 'view'])->name('user.view');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('store', [UserController::class, 'store'])->name('user.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    });
    //  manage profile route
    Route::prefix('profiles')->group(function () {
        Route::get('/view', [ProfileController::class, 'view'])->name('profile.view');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change.password');
        Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');
    });

    //  manage division
    Route::prefix('divisions')->group(function () {
        Route::get('/view', [DivisionController::class, 'view'])->name('division.view');
        Route::get('/create', [DivisionController::class, 'create'])->name('division.create');
        Route::post('store', [DivisionController::class, 'store'])->name('division.store');
        Route::get('edit/{id}', [DivisionController::class, 'edit'])->name('division.edit');
        Route::post('update/{id}', [DivisionController::class, 'update'])->name('division.update');
        Route::get('active/{id}', [DivisionController::class, 'active'])->name('division.active');
        Route::get('inactive/{id}', [DivisionController::class, 'inactive'])->name('division.inactive');
        Route::get('delete/{id}', [DivisionController::class, 'delete'])->name('division.delete');
    });
    //  manage districts
    Route::prefix('districts')->group(function () {
        Route::get('/view', [DistrictController::class, 'view'])->name('district.view');
        Route::get('/create', [DistrictController::class, 'create'])->name('district.create');
        Route::post('store', [DistrictController::class, 'store'])->name('district.store');
        Route::get('edit/{id}', [DistrictController::class, 'edit'])->name('district.edit');
        Route::post('update/{id}', [DistrictController::class, 'update'])->name('district.update');
        Route::get('active/{id}', [DistrictController::class, 'active'])->name('district.active');
        Route::get('inactive/{id}', [DistrictController::class, 'inactive'])->name('district.inactive');
        Route::get('delete/{id}', [DistrictController::class, 'delete'])->name('district.delete');
    });

    //  default ajax route
    Route::get('/get-district', [DefaultController::class, 'getDistrict'])->name('default.get-district');
    Route::get('/get-upazila', [DefaultController::class, 'getUpazila'])->name('default.get-upazila');
    Route::get('/get-union', [DefaultController::class, 'getUnion'])->name('default.get-union');
    Route::get('/get-ward-no', [DefaultController::class, 'getWardNo'])->name('default.get-ward-no');

    //  manage upazilas
    Route::prefix('upazilas')->group(function () {
        Route::get('/view', [UpazilaController::class, 'view'])->name('upazila.view');
        Route::get('/create', [UpazilaController::class, 'create'])->name('upazila.create');
        Route::post('store', [UpazilaController::class, 'store'])->name('upazila.store');
        Route::get('edit/{id}', [UpazilaController::class, 'edit'])->name('upazila.edit');
        Route::post('update/{id}', [UpazilaController::class, 'update'])->name('upazila.update');
        Route::get('active/{id}', [UpazilaController::class, 'active'])->name('upazila.active');
        Route::get('inactive/{id}', [UpazilaController::class, 'inactive'])->name('upazila.inactive');
        Route::get('delete/{id}', [UpazilaController::class, 'delete'])->name('upazila.delete');
    });
    //  manage unions
    Route::prefix('unions')->group(function () {
        Route::get('/view', [UnionController::class, 'view'])->name('union.view');
        Route::get('/create', [UnionController::class, 'create'])->name('union.create');
        Route::post('store', [UnionController::class, 'store'])->name('union.store');
        Route::get('edit/{id}', [UnionController::class, 'edit'])->name('union.edit');
        Route::post('update/{id}', [UnionController::class, 'update'])->name('union.update');
        Route::get('active/{id}', [UnionController::class, 'active'])->name('union.active');
        Route::get('inactive/{id}', [UnionController::class, 'inactive'])->name('union.inactive');
        Route::get('delete/{id}', [UnionController::class, 'delete'])->name('union.delete');
    });
    //  manage ward no
    Route::prefix('ward-no')->group(function () {
        Route::get('/view', [WardNoController::class, 'view'])->name('ward-no.view');
        Route::get('/create', [WardNoController::class, 'create'])->name('ward-no.create');
        Route::post('store', [WardNoController::class, 'store'])->name('ward-no.store');
        Route::get('edit/{id}', [WardNoController::class, 'edit'])->name('ward-no.edit');
        Route::post('update/{id}', [WardNoController::class, 'update'])->name('ward-no.update');
        Route::get('active/{id}', [WardNoController::class, 'active'])->name('ward-no.active');
        Route::get('inactive/{id}', [WardNoController::class, 'inactive'])->name('ward-no.inactive');
        Route::get('delete/{id}', [WardNoController::class, 'delete'])->name('ward-no.delete');
    });
    //  manage village
    Route::prefix('villages')->group(function () {
        Route::get('/view', [VillageController::class, 'view'])->name('village.view');
        Route::get('/create', [VillageController::class, 'create'])->name('village.create');
        Route::post('store', [VillageController::class, 'store'])->name('village.store');
        Route::get('edit/{id}', [VillageController::class, 'edit'])->name('village.edit');
        Route::post('update/{id}', [VillageController::class, 'update'])->name('village.update');
        Route::get('active/{id}', [VillageController::class, 'active'])->name('village.active');
        Route::get('inactive/{id}', [VillageController::class, 'inactive'])->name('village.inactive');
        Route::get('delete/{id}', [VillageController::class, 'delete'])->name('village.delete');
    });




});