<?php

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


//Routes use for admin_side

Route::group(['prefix' => 'admin','middleware'=>'isAdmin'], function () {
//    Auth::routes();

    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

    Route::get('/logout','Admin\AdminController@logout');

    // Routes use for user management
    Route::group(['prefix' => 'user'], function() {

        // Api get user
        Route::get('api/user', 'Admin\UserController@apiUser')->name('api.user');

        // Show list user
        Route::get('/', 'Admin\UserController@index')->name('admin.user.index');

        // Create user
        Route::post('/create', 'Admin\UserController@store')->name('admin.user.create');

        // Update user
        Route::get('/update/{id}', 'Admin\UserController@edit')->name('admin.user.edit');
        Route::patch('/update/{id}', 'Admin\UserController@update')->name('admin.user.update');

        // Delete user
        Route::delete('/delete/{id}', 'Admin\UserController@destroy')->name('admin.user.destroy');
    });

    // Routes use for product management
    Route::group(['prefix' => 'product'], function() {
        // Api get product
        Route::get('api/product', 'Admin\ProductController@apiProduct')->name('api.product');

        // Show list product
        Route::get('/', 'Admin\ProductController@index')->name('admin.product.index');

        // Create product
        Route::post('/create', 'Admin\ProductController@store')->name('admin.product.create');

        // Update product
        Route::get('/update/{id}', 'Admin\ProductController@edit')->name('admin.product.edit');
        Route::patch('/update/{id}', 'Admin\ProductController@update')->name('admin.product.update');

        // Delete user
        Route::delete('/delete/{id}', 'Admin\ProductController@destroy')->name('admin.product.destroy');

    });

    // Routes use for bill management
    Route::group(['prefix' => 'bill'], function() {
        // Api get bill
        Route::get('api/bill', 'Admin\BillController@apiBill')->name('api.bill');

        // Show list bill
        Route::get('/', 'Admin\BillController@index')->name('admin.bill.index');

        // Create bill
        Route::post('/create', 'Admin\BillController@store')->name('admin.bill.create');

        // Update bill
        Route::get('/update/{id}', 'Admin\BillController@edit')->name('admin.bill.edit');
        Route::patch('/update/{id}', 'Admin\BillController@update')->name('admin.bill.update');

        // Delete bill
        Route::delete('/delete/{id}', 'Admin\BillController@destroy')->name('admin.bill.destroy');

        // Route::get('/back', 'Admin\BillController@back');

        Route::get('/details/{id}', 'Admin\BillController@detailsOrder');

        Route::get('/date', 'Admin\BillController@dateOrder');

        Route::get('/process/{id}', 'Admin\BillController@processOrder');

        Route::get('/export/excel', 'Admin\BillController@excelOrder');

        Route::get('/report', 'Admin\BillController@reportOrder')->name('admin.bill.report');

        Route::get('/export/pdf/{id}', 'Admin\BillController@pdfOrder');

        Route::get('/report/search','Admin\BillController@searchBillReport');

        Route::get('/report/search/ajax/name','Admin\BillController@searchBillReportByName');

    });

    // Routes use for category management
    Route::group(['prefix' => 'category'], function() {
        // Api get category
        Route::get('api/category', 'Admin\CategoryController@apiCategory')->name('api.category');

        // Show list product
        Route::get('/', 'Admin\CategoryController@index')->name('admin.category.index');

        // Create product
        Route::post('/create', 'Admin\CategoryController@store')->name('admin.category.create');

        // Update product
        Route::get('/update/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit');
        Route::patch('/update/{id}', 'Admin\CategoryController@update')->name('admin.category.update');

        // Delete user
        Route::delete('/delete/{id}', 'Admin\CategoryController@destroy')->name('admin.category.destroy');
    });

    Route::group(['prefix' => 'contact'], function() {
    	// Api get bill
        Route::get('api/contact', 'Admin\ContactController@apiContact')->name('api.contact');

        // Show list product
        Route::get('/', 'Admin\ContactController@index')->name('admin.contact.index');

        // Update contact
        Route::get('/update/{id}', 'Admin\ContactController@edit')->name('admin.contact.edit');
        Route::patch('/update/{id}', 'Admin\ContactController@update')->name('admin.contact.update');

        // Delete contact
        Route::delete('/delete/{id}', 'Admin\ContactController@destroy')->name('admin.contact.destroy');

    });

    Route::get('/calendar','Admin\EventController@calendar');

    Route::post('/calendar/add','Admin\EventController@addEvent');


});



Route::get('previewcart',
	['as'=>'don-dat-hang',
	'uses'=>'UserController@previewCart'
]);

Route::get('/', function () {
    return redirect('index');
});

Route::get('index',
	['as' => 'page-index',
	'uses' => 'HomeController@index'
]);

Route::group(['prefix' => 'categories'],function() {

	Route::get('search',
	['as' => 'search-categories',
	'uses' => 'CategoryController@searchCategories'
	]);

	Route::get('products/autoget',
	['as' => 'auto-name-search',
	'uses' => 'CategoryController@autoGetSearch'
	]);

	Route::get('{id}',
	['as' => 'categories-products',
	'uses' => 'CategoryController@showProducts'
	]);

	Route::get('product/{id}',
	['as' => 'product-detail',
	'uses' => 'ProductController@getProductDetail'
	]);

});

Route::get('products/search',
	['as' => 'search-products',
	'uses' => 'ProductController@searchProducts'
]);

Route::get('contact',
	['as' => 'page-contact',
	'uses' => 'PageController@contact'
]);
Route::get('ajax/categories/{id}',
	['as' => 'ajax-categories-products',
	'uses' => 'CategoryController@ajaxPaginateProducts'
]);

/** User Profile**/
Route::group(['prefix' => 'user'],function(){

	Route::get('checkout',
	['as' => 'page-checkout',
	'uses' => 'BillController@checkout'
	]);
	
	Route::post('checkout',
	['as' => 'confirm-checkout',
	'uses' => 'BillController@confirmCheckout'
	]);

	Route::get('previewCart',
	['as' => 'page-preview-cart',
	'uses' => 'UserController@previewCart'
	]);

	Route::post('login',
	['as' => 'page-login',
	'uses' => 'UserController@login'
	]);

	Route::get('forgetpassword',
	['as' => 'page-forget-password',
	'uses' => 'UserController@forgetPassword'
	]);

	Route::get('logout',
	['as' => 'page-logout',
	'uses' => 'UserController@logout'
	]);

	Route::post('signup',
	['as' => 'page-signup',
	'uses' => 'UserController@signup'
	]);

	Route::get('{id}',
	['as' => 'profile',
	'uses' => 'UserController@userProfile'
	]);

	Route::patch('update/{id}',
	['as' => 'update-profile',
	'uses' => 'UserController@userUpdate'
	]);

	Route::get('changePassword/{id}',
	['as' => 'profile',
	'uses' => 'UserController@changePasswordShow'
	]);

	Route::patch('changePassword/update/{id}',
	['as' => 'update-password',
	'uses' => 'UserController@changePassword'
	]);

	Route::post('product/{id}/comment',
	['as' => 'comment',
	'uses' => 'UserController@comment'

	]);

	Route::get('deleteBill/{id}',
	['as' => 'delete-bill',
	'uses' => 'BillController@deleteBill'
]);

});

/** ------------**/
Route::group(['prefix' => 'cart'],function(){
	
	Route::post('add/{id}',
	['as' => 'add-item-cart',
	'uses' => 'PageController@addItemCart'
	]);

	Route::get('delete/{id}',
	['as' => 'delete-item-cart',
	'uses' => 'PageController@deleteItemCart'
	]);

	Route::post('update/{id}',
	['as' => 'update-item-cart',
	'uses' => 'PageController@updateItemCart'
	]);

	Route::post('add/{id}/qty',
	['as' => 'add-item-cart-qty',
	'uses' => 'PageController@addItemCartQty'
	]);

	Route::get('',
	['as' => 'shopping-cart',
	'uses' => 'PageController@listCart'
	]);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact/post','ContactController@index');

Route::get('comment/delete/{id}',
	['as' => 'delete-comment',
	'uses' => 'UserController@deleteComment'
]);

Route::get('bills/{id}/export',
	['as' => 'export-bills',
	'uses' => 'UserController@exportBill'
]);

Auth::routes();

Route::get('/redirect', 'UserController@redirectToProvider')->name("login.provider");
Route::get('/callback', 'UserController@handleProviderCallback');