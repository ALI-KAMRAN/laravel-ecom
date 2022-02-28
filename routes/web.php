<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontEndController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductBookingController;
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

Route::get('/home', function () {
    return view('welcome');
});
Route::get('/master', function () {
    return view('products.add');
});

Route::get('/', [App\Http\Controllers\frontEndController::class, 'index'])->name('homePage');
Route::get('/specialOffer', [App\Http\Controllers\frontEndController::class, 'specialOffer'])->name('specialOffer');
Route::get('/delivery', [App\Http\Controllers\frontEndController::class, 'delivery'])->name('delivery');
Route::get('/contact', [App\Http\Controllers\frontEndController::class, 'contact'])->name('contact');
Route::get('/cart', [App\Http\Controllers\frontEndController::class, 'cart'])->name('cart');

// cart data store on buy table (productManager)
Route::post('/productBooking', [App\Http\Controllers\ProductBookingController::class, 'store'])->name('productBooking');


// cart data (items) delete
Route::get('/cartDelete', [App\Http\Controllers\CartController::class, 'destroy'])->name('cartDelete');


Route::get('/productDetails/{id}', [App\Http\Controllers\frontEndController::class, 'productDetails'])->name('productDetails');

// user login page
Route::get('/userLogin', [App\Http\Controllers\frontEndController::class, 'userLogin'])->name('userLogin');

// user login check 
Route::post('/userLoginCheck', [App\Http\Controllers\frontEndController::class, 'userCheck'])->name('userCheck');

// user login data store
Route::get('/userDataStore', [App\Http\Controllers\frontEndController::class, 'userDataStore'])->name('userDataStore');

// user logout
Route::get('/userLogout', [App\Http\Controllers\frontEndController::class, 'userLogout'])->name('userLogout');


// user register page
Route::get('/userRegister', [App\Http\Controllers\frontEndController::class, 'userRegister'])->name('userRegister');


// user store data into cart
Route::get('/itemCart', [App\Http\Controllers\CartController::class, 'store'])->name('cartStore');



// admin side

Route::get('/admin/login', [App\Http\Controllers\adminController::class, 'adminLogin'])->name('adminLogin');




Route::group(['middleware' => 'auth'],function(){

// main dashboard page
Route::get('/admin/dashboard', [App\Http\Controllers\adminController::class, 'adminDashboard'])->name('adminDashboard');

// admin logout method
Route::get('/admin/logout', [App\Http\Controllers\adminController::class, 'adminLogout'])->name('admin.logout');

// admin category area
Route::get('/addCategory', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');

// admin save category
Route::get('/admin/addCategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');

// admin view category
Route::get('/categoriesView', [App\Http\Controllers\CategoryController::class, 'index'])->name('viewCategory');

// admin edit category
Route::get('/categories/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('editCategory');

// admin update category
Route::get('/categories/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('updateCategory');

// admin delete category
Route::get('/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('deleteCategory');



// admin product area
Route::get('/productsView', [App\Http\Controllers\ProductController::class, 'index'])->name('productsView');

// admin create product 
Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('productsCreate');

// admin store product 
Route::post('/productsStore', [App\Http\Controllers\ProductController::class, 'store'])->name('productsStore');

// admin edit product 
Route::get('/productsEdit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('productsEdit');

// admin update product 
Route::post('/productsUpdate/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('productsUpdate');

// admin delete product 
Route::post('/productsDelete', [App\Http\Controllers\ProductController::class, 'destroy'])->name('productsDelete');

// admin add extra product details (view page)
Route::get('/productExtraDetails/{id}', [App\Http\Controllers\ProductController::class, 'productDetail'])->name('productExtraDetails');

// admin store extra product details 
Route::post('/productExtraDetailsstore/{id}', [App\Http\Controllers\ProductController::class, 'productDetailStore'])->name('productDetailStore');


// user book products show on admin side
Route::get('/productBooks}', [App\Http\Controllers\ProductBookingController::class, 'index'])->name('productBooks');


// user book products delete on admin side
Route::get('/productBookDelete}', [App\Http\Controllers\ProductBookingController::class, 'destroy'])->name('productBookDelete');


// user book products status change
Route::get('/bookingProductStatus}', [App\Http\Controllers\ProductBookingController::class, 'change_booking_status'])->name('bookingProductStatus');




// user data show on admin dashboard
Route::get('/userData', [App\Http\Controllers\adminController::class, 'userData'])->name('userData');

// user data delete on admin dashboard
Route::post('/userDelete', [App\Http\Controllers\adminController::class, 'userDelete'])->name('userDelete');



});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

