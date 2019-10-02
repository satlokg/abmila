<?php
use App\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\User;


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
    return view('user.welcome2');
});



Route::get('markasread', function () {
   \Auth::user()->notifications->markAsRead();
   return redirect()->back();
})->name('markAsRead');
Route::get('markasunread', function () {
   \Auth::user()->notifications->markAsUnRead();
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/notify', 'HomeController@notify')->name('notify');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/home', 'Admin\AdminController@index')->name('admin.home');
    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
    Route::get('/vendors', 'Admin\AdminController@vendors')->name('admin.vendors');
    //category
    Route::get('/category', 'Admin\CategoryController@index')->name('admin.category');
    Route::get('/category/add', 'Admin\CategoryController@categoryForm')->name('admin.category.add');
    Route::post('/category/post', 'Admin\CategoryController@categoryPost')->name('admin.category.post');
    Route::get('/category/edit/{id}', 'Admin\CategoryController@categoryEdit')->name('admin.category.edit');

    //sub-category
    Route::get('/sub-category/{cat_id?}', 'Admin\CategoryController@subCategory')->name('admin.subCategory');
    Route::get('/subcategory/add', 'Admin\CategoryController@subCategoryForm')->name('admin.subCategory.add');
    Route::post('/sub-category/post', 'Admin\CategoryController@subCategoryPost')->name('admin.subCategory.post');
    Route::get('/sub-category/edit/{id}', 'Admin\CategoryController@subCategoryEdit')->name('admin.subCategory.edit');

    //brand
    Route::get('/brands/{subcat_id?}', 'Admin\CategoryController@brand')->name('admin.brand');
    Route::get('/brand/add', 'Admin\CategoryController@brandForm')->name('admin.brand.add');
    Route::post('/brand/post', 'Admin\CategoryController@brandPost')->name('admin.brand.post');
    Route::get('/brand/edit/{id}', 'Admin\CategoryController@brandEdit')->name('admin.brand.edit');

    //service
    Route::get('/service', 'Admin\CategoryController@service')->name('admin.service');
    Route::get('/service/add', 'Admin\CategoryController@serviceForm')->name('admin.service.add');
    Route::post('/service/post', 'Admin\CategoryController@servicePost')->name('admin.service.post');
    Route::get('/service/edit/{id}', 'Admin\CategoryController@serviceEdit')->name('admin.service.edit');

    //city-zone
    Route::get('/zone', 'Admin\CityController@index')->name('admin.zone');
    Route::get('/zone/add', 'Admin\CityController@zoneForm')->name('admin.zone.add');
    Route::post('/zone/post', 'Admin\CityController@zonePost')->name('admin.zone.post');
    Route::get('/zone/edit/{id}', 'Admin\CityController@zoneEdit')->name('admin.zone.edit');

    //city
    Route::get('/city', 'Admin\CityController@city')->name('admin.city');
    Route::get('/city/add', 'Admin\CityController@cityForm')->name('admin.city.add');
    Route::post('/city/post', 'Admin\CityController@cityPost')->name('admin.city.post');
    Route::get('/city/edit/{id}', 'Admin\CityController@cityEdit')->name('admin.city.edit');


    //pincode
    Route::get('/pincode', 'Admin\CityController@pincode')->name('admin.pincode');
    Route::get('/pincode/add', 'Admin\CityController@pincodeForm')->name('admin.pincode.add');
    Route::post('/pincode/post', 'Admin\CityController@pincodePost')->name('admin.pincode.post');
    Route::get('/pincode/edit/{id}', 'Admin\CityController@pincodeEdit')->name('admin.pincode.edit');

    //area
    Route::get('/area', 'Admin\CityController@area')->name('admin.area');
    Route::get('/area/add', 'Admin\CityController@areaForm')->name('admin.area.add');
    Route::post('/area/post', 'Admin\CityController@areaPost')->name('admin.area.post');
    Route::get('/area/edit/{id}', 'Admin\CityController@areaEdit')->name('admin.area.edit');

    //keyword
    Route::get('/keyword', 'Admin\KeywordController@index')->name('admin.keyword');
    Route::get('/keyword/add', 'Admin\KeywordController@keywordForm')->name('admin.keyword.add');
    Route::post('/keyword/post', 'Admin\KeywordController@keywordPost')->name('admin.keyword.post');

    //business
    Route::get('/business-list', 'Admin\ListController@index')->name('admin.business');
    Route::get('/business-list/add', 'Admin\ListController@keywordForm')->name('admin.business.add');
    Route::post('/business-list/post', 'Admin\ListController@keywordPost')->name('admin.business.post');

    //ajax
    Route::get('/ajax/delete/{id}/{type}', 'Admin\AjaxController@delete')->name('ajax.delete');
    Route::get('/ajax/{id}/{type}', 'Admin\AdminController@ajax')->name('admin.ajax');
});

Route::prefix('vendor')->group(function() {
    Route::get('/login', 'Auth\VendorLoginController@showLoginForm')->name('vendor.login');
    Route::post('/login', 'Auth\VendorLoginController@login')->name('vendor.login.submit');
    Route::get('/home', 'Vendor\VendorController@index')->name('vendor.home');
    Route::get('/dashboard', 'Vendor\VendorController@dashboard')->name('vendor.dashboard');
    Route::get('/profile', 'Vendor\VendorController@profile')->name('vendor.profile');
});

//user

Route::get('/business-list', 'User\ListController@businessList')->name('businessList');
Route::post('/business-list', 'User\ListController@businessPost')->name('businessPost');