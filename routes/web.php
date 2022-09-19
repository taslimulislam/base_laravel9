<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

// Route::resource('products', ProductController::class);

// Route::get('products', [ProductController::class, 'index'])->name('products.index');
// Route::post('products', [ProductController::class, 'store'])->name('products.store');
// Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
// Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
// // Route::get('products/{product:name}', [ProductController::class, 'show'])->name('products.show'); route model binding example
// Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
// Route::delete('products/{product}', [ProductController::class, 'update'])->name('products.destroy');

Route::prefix("products")->group(function(){

    Route::controller(ProductController::class)->group(function (){

        Route::name('admin.')->group(function () {
            Route::get('/','index')->name('products.index');
            Route::post('/', 'store')->name('products.store');
            Route::get('/create', 'create')->name('products.create');
            Route::get('/{product}', 'show')->name('products.show');
            Route::get('/{product}/edit', 'edit')->name('products.edit');
            Route::put('/{product}','update')->name('products.update');
            Route::delete('/{product}', 'update')->name('products.destroy');
        });

    });

});

Route::get('/category', [CategoryController::class, 'index']);


Route::get('/', function () {
    // dd(phpinfo());
    return view('welcome');
});


// Route::prefix('libraries')->group(function () {

//     // Route::middleware(['first', 'second'])->group(function () {

//         Route::name('selfcategory.')->group(function () {

//             Route::controller(BookSelfCategoryController::class)->group(function () {
    
//                 Route::get('/selfcategories/index', 'index')->name('index');
//                 Route::get('/selfcategories/create', 'create')->name('create');
//                 Route::post('/selfcategories/store', 'store')->name('store');
//                 Route::get('/selfcategories{selfcategory}', 'show')->name('show');
//                 Route::get('/selfcategories{selfcategory:uuid}/edit', 'edit')->name('edit');
//                 Route::put('/update/selfcategories{selfcategory:uuid}', 'update')->name('update');
//                 Route::delete('delete/selfcategories{selfcategory:uuid}', 'destroy')->name('destroy');
//             });


//         });


//         Route::name('shelf.')->group(function () {

//             Route::controller(BookSelfController::class)->group(function () {
//                 Route::get('/shelf/index', 'index')->name('index');
//                 Route::get('/shelf/create', 'create')->name('create');
//                 Route::post('/shelf/store', 'store')->name('store');
//                 Route::get('/shelf{shelf}', 'show')->name('show');
//                 Route::get('/shelf{shelf:uuid}/edit', 'edit')->name('edit');
//                 Route::put('/update/shelf{shelf:uuid}', 'update')->name('update');
//                 Route::delete('delete/shelf{shelf:uuid}', 'destroy')->name('destroy');
//             });
//         });

//     // });

// });