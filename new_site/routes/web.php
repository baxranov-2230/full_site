<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubDistrictController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout',[AdminController::class, 'Logout'])->name('admin.logout');

// Admin Category

Route::get('/categories',[CategoryController::class, 'Index'])->name('categories');
Route::get('/add/category',[CategoryController::class,
    'AddCategory'])->name('add.category');
Route::post('/store/category',[CategoryController::class, 'StoreCategory'])->name('store.category');

Route::get('/edit/category/{id}',[CategoryController::class,
    'EditCategory'])->name('edit.category');

Route::post('/update/category/{id}',[CategoryController::class,
    'UpdateCategory'])->name('update.category');

Route::get('/delete/category/{id}',[CategoryController::class,
    'DeleteCategory'])->name('delete.category');


// Admin SubCategory

Route::get('/subcategories',[SubCategoryController::class, 'Index'])->name('subcategories');

Route::get('/add/subcategory',[SubCategoryController::class,
    'AddSubCategory'])->name('add.subcategory');

Route::post('/store/subcategory',[SubCategoryController::class, 'StoreSubCategory'])->name('store.subcategory');

Route::get('/edit/subcategory/{id}',[SubCategoryController::class, 'EditSubCategory'])
    ->name('edit.subcategory');

Route::post('/update/subcategory/{id}',[SubCategoryController::class, 'UpdateSubCategory'])
    ->name('update.subcategory');

Route::get('/delete/subcategory/{id}',[SubCategoryController::class,
    'DeleteSubCategory'])->name('delete.subcategory');


// Admin District
Route::get('/district',[DistrictController::class, 'Index'])->name('district');

Route::get('/add/district',[DistrictController::class, 'AddDistrict'])
    ->name('add.district');

Route::post('/store/district',[DistrictController::class, 'StoreDistrict'])->name('store.district');

Route::get('/edit/district/{id}',[DistrictController::class, 'EditDistrict'])
    ->name('edit.district');

Route::post('/update/district/{id}',[DistrictController::class, 'UpdateDistrict'])
    ->name('update.district');

Route::get('/delete/district/{id}',[DistrictController::class,
    'DeleteDistrict'])->name('delete.district');



// Admin SubDistrict

Route::get('/subdistrict',[SubDistrictController::class, 'Index'])->name('subdistrict');

Route::get('/add/subdistrict',[SubDistrictController::class,
    'AddSubDistrict'])->name('add.subdistrict');

Route::post('/store/subdistrict',[SubDistrictController::class,
    'StoreSubDistrict'])->name('store.subdistrict');

Route::get('/edit/subdistrict/{id}',[SubDistrictController::class, 'EditSubDistrict'])
    ->name('edit.subdistrict');

Route::post('/update/subdistrict/{id}',[SubDistrictController::class, 'UpdateSubDistrict'])
    ->name('update.subdistrict');

Route::get('/delete/subdistrict/{id}',[SubDistrictController::class,
    'DeleteSubDistrict'])->name('delete.subdistrict');





// Json data For Category

Route::get('/get/subcategory/{category_id}',[PostController::class, 'GetSubCategory']);

Route::get('/get/subdistrict/{district_id}',[PostController::class, 'GetSubDistrict']);


// Admin All Post

Route::get('/createpost',[PostController::class, 'Create'])->name('create.post');
