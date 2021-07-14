<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContentPagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\RazorpayController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\SocialAccountController;
use App\Http\Controllers\Auth\LinkedSocialAccountController;


Route::get('paywithrazorpay', [RazorpayController::class,'payWithRazorpay'])->name('paywithrazorpay');
Route::post('payment', [RazorpayController::class,'payment'])->name('payment');



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
    return view('frontend.home');
});


Route::get('/category/{slug?}', [CategoriesController::class,'cat_products']);
Route::get('/product/{slug?}', [ProductsController::class,'show_product']);


Route::get('/payment', [ProductsController::class,'show_payments']);


Route::post('/product/add/cart', [CartController::class,'addToCart'])->name('product.add.cart');
Route::get('/cart', [CartController::class,'getCart'])->name('orders.show_cart');
Route::get('review-cart', [CartController::class,'show_checkout_review'])->name('orders.review_cart');
Route::get('/cart/item/{id}/remove', [CartController::class,'removeItem'])->name('checkout.cart.remove');
Route::post('/cart/item/{id}/update', [CartController::class,'update_cart'])->name('checkout.cart.update');
Route::get('/checkout', [CartController::class,'show_checkout'])->name('orders.checkout');

Route::get('wishlist-store/{id?}', [WishlistController::class,'store'])->name('wishlist.store');
Route::get('wishlist-destroy/{id?}', [WishlistController::class,'destroy'])->name('wishlist.destroy');

Route::get('/wishlist', [WishlistController::class,'index'])->name('wishlist.index');

Route::post('custom-registration', [CustomerController::class,'customRegistration'])->name('register.customer');
Route::post('custom-login', [CustomerController::class,'customLogin'])->name('register.login');

Route::post('checkout-registration', [CartController::class,'show_checkout_review'])->name('register.checkout');

Route::any('customer-logout', [CustomerController::class,'logout'])->name('register.logout');

Route::get('/products/locations', function () {	
    return view('frontend.product_location');
});



Route::any('customer-myaccount', [CustomerController::class,'customRegistration'])->name('customer.myaccount');
Route::any('customer-signin', [CustomerController::class,'signin'])->name('customer.signin');


Route::any('payment-selected', function (Request $request) {	
if($request->paymentMode=="epay-razorpay")
{
	return view('frontend.razorpayform');
}
else{
	return redirect()->back()->with('error', 'Selected Payment gateway not activated.');
}

})->name('payment.selected');


Route::get('/contactus', [ContentPagesController::class,'show_contact_page']);
Route::get('/help', [ContentPagesController::class,'show_help_page']);
Route::get('/registration', [ContentPagesController::class,'show_registration_page'])->name('registeration.form');
Route::get('/terms_conditions', [ContentPagesController::class,'show_terms_conditions_page']);
Route::get('/faqs', [ContentPagesController::class,'show_faqs_page']);
Route::get('/how_it_works', [ContentPagesController::class,'show_how_it_works']);
Route::get('/canellation_and_refund_policy', [ContentPagesController::class,'show_canc_refund_page']);
Route::get('/shipping_and_delivery', [ContentPagesController::class,'show_shipping_delivery_page']);
Route::get('/disclaimer', [ContentPagesController::class,'show_disclaimer_page']);
Route::get('/privany_policy', [ContentPagesController::class,'show_privany_policy_page']);

Route::group(['middleware' => 'under-construction'], function () {	
	Route::get('/reset_password', function() {  });
	Route::get('/blog', function() {  });
	Route::get('/search', function() {  });
	Route::get('/products', function() {  });
	Route::get('category/collections', function() {  });
	Route::get('/sale', function() {  });
});






Route::get('login/{provider}', [SocialAccountController::class,'redirectToProvider']);
Route::get('login/{provider}/callback', [SocialAccountController::class,'handleProviderCallback']);



