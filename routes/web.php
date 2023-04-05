<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\CilentController;
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

// Route::get('/', function () {
//     return view('frontend.layouts.template');
// });
Route::get('/',[HomeController::class,'index'])->name('home');

Route::controller(CilentController::class)->group(function(){

    Route::get('/category/{id}/{slug}','CategoryPage')->name('category');
    Route::get('/single-product/{id}/{slug}','SingleProduct')->name('singleproduct');
    // Route::get('/add-to-cart','AddToCart')->name('addtocart');

    Route::get('/check-out','CheckoutPage')->name('checkout');
   
    // Route::get('/user-profile','UserProfile')->name('userprofile');
   });

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth','role:user'])->name('dashboard');

Route::middleware(['auth','role:user'])->group(function(){

Route::controller(CilentController::class)->group(function(){

        Route::get('/add-to-cart','AddToCart')->name('addtocart');
        Route::post('/product-add-to-cart','ProductAddToCart')->name('productAddTocart');
        Route::get('/check-out','CheckoutPage')->name('checkout');
        Route::get('/shipping-addres','ShippingAddress')->name('shippingaddress');
        Route::post('/shipping-add-address','Shipping_Address_Add')->name('addaddress');

        Route::post('/cancel-order','CancelOrder')->name('ordercancel');
        Route::post('/placed-order','Placed_Order')->name('orderplace');

    
        Route::get('/pending-orders','PendingOrder')->name('pendingorders');
        Route::get('/history','History')->name('history');
        Route::get('/remove-cart/{id}','RemoveCart')->name('cartremove');
    
        Route::get('/user-profile','UserProfile')->name('confirmorder');
       });


});
Route::middleware(['auth','role:admin'])->group(function(){

    Route::controller(CategoryController::class)->group(function(){

        Route::get('/admin/all-category','Index')->name('allcategory');
        Route::get('/admin/add-category','AddCategory')->name('addcategory');
        Route::post('/admin/store-category','StoreCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}','EditCategory')->name('editcategory');
        Route::post('/admin/update-category','UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}','DeleteCategory')->name('deletecategory');

       });
       Route::controller(SubCategoryController::class)->group(function(){

        Route::get('/admin/all-subcategory','Index')->name('allsubcategory');
        Route::get('/admin/add-subcategory','AddSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory','StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}','EditSubCategory')->name('editsubcategory');
        Route::post('/admin/update-subcategory','UpdateSubCategory')->name('updatesubcategory');
        Route::get('/admin/delete-subcategory/{id}','DeleteSubCategory')->name('deletesubcategory');

        });

       Route::controller(ProductController::class)->group(function(){

        Route::get('/admin/all-product','Index')->name('allproduct');
        Route::get('/admin/add-product','AddProduct')->name('addproduct');
        Route::post('/admin/store-product','StoreProduct')->name('storeproduct');

        Route::get('/admin/edit-productimg/{id}','EditProductImg')->name('editproductImg');
        Route::post('/admin/update-productimg/{id}','UpdateProductImg')->name('updateproductImg');

        Route::get('/admin/edit-product/{id}','EditProduct')->name('editproduct');
        Route::post('/admin/update-product','UpdateProduct')->name('updateproduct');
        Route::get('/admin/delete-product/{id}','DeleteProduct')->name('delete-product');


       });

       Route::controller(OrderController::class)->group(function(){

        Route::get('/admin/pending-order','Index')->name('pendingorder');
         Route::get('/admin/approve-order/{id}','Approve_Order')->name('approve');



       });
Route::controller(DashboardController::class)->group(function(){

     Route::get('/admin/dashboard','Index')->name('admindashboard');


    });

    


});


require __DIR__.'/auth.php';
