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
Route::get('search', 'User\ListController@index')->name('search');
Route::get('autocomplete', 'User\ListController@autocomplete')->name('autocomplete');


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
Route::post('/rating', 'HomeController@rating')->name('rating');


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

    //state
    Route::get('/state', 'Admin\CityController@state')->name('admin.state');
    Route::get('/state/add', 'Admin\CityController@stateForm')->name('admin.state.add');
    Route::post('/state/post', 'Admin\CityController@statePost')->name('admin.state.post');
    Route::get('/state/edit/{id}', 'Admin\CityController@stateEdit')->name('admin.state.edit');

    //country
    Route::get('/country', 'Admin\CityController@country')->name('admin.country');
    Route::get('/country/add', 'Admin\CityController@countryForm')->name('admin.country.add');
    Route::post('/country/post', 'Admin\CityController@countryPost')->name('admin.country.post');
    Route::get('/country/edit/{id}', 'Admin\CityController@countryEdit')->name('admin.country.edit');


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
    Route::get('/keyword/manual', 'Admin\KeywordController@keywordManual')->name('admin.keyword.manual');
    Route::post('/keyword/post', 'Admin\KeywordController@keywordPost')->name('admin.keyword.post');
    Route::post('/keyword/manualpost', 'Admin\KeywordController@manualpost')->name('admin.keyword.manualpost');

    //business
    Route::get('/business/{id?}/{action?}', 'Admin\ListController@index')->name('admin.business');
    Route::post('/business/{id?}/{action?}', 'Admin\ListController@index')->name('admin.business.post');
    Route::get('/business-list', 'Admin\ListController@businessList')->name('admin.businessList');
    Route::get('/business-list/edit/{id}', 'Admin\ListController@businessListEdit')->name('admin.businessListEdit');
    Route::post('/business-list', 'Admin\ListController@businessPost')->name('admin.businessPost');
    Route::post('/final-list', 'Admin\ListController@finalPost')->name('admin.finalPost');

    Route::get('/business-keyword/{listing_id?}/{cat_id?}', 'Admin\ListController@businessKeyword')->name('admin.businessKey');

    //Lead
    Route::get('/lead', 'Admin\ListController@lead')->name('admin.lead');
    Route::get('/leadadd/{id}', 'Admin\ListController@leadadd')->name('admin.lead.add');
    Route::post('/lead/post', 'Admin\ListController@leadPost')->name('admin.lead.post');
    Route::get('/lead/edit/{id}', 'Admin\ListController@areaEdit')->name('admin.lead.edit');
    //inquiry
    Route::get('/inquiry', 'Admin\ListController@inquiry')->name('admin.inquiry');
    Route::get('/leaddetail', 'Admin\ListController@leaddetail')->name('admin.leaddetail');
    //company
    Route::get('/company/{status?}', 'Admin\CompanyController@company')->name('admin.company');
    Route::get('/company/edit/{id?}', 'Admin\CompanyController@edit')->name('admin.company.edit');
    Route::get('/company/delete/{id?}', 'Admin\CompanyController@delete')->name('admin.company.delete');

    //company
    Route::get('/lead/distribution/{id?}', 'Admin\CompanyController@distribution')->name('admin.distribution');


    //advertisments
    Route::get('/advertisment', 'Admin\AdvertismentController@index')->name('admin.advertisments');
    Route::get('/advertisment/add', 'Admin\AdvertismentController@add')->name('admin.advertisments.add');
    Route::post('/advertisment/post', 'Admin\AdvertismentController@post')->name('admin.advertisments.post');
    Route::get('/advertisment/view/{id?}', 'Admin\AdvertismentController@view')->name('admin.advertisments.view');
    Route::get('/advertisment/delete/{id?}', 'Admin\AdvertismentController@delete')->name('admin.advertisments.delete');
    


    //user
    Route::get('/users', 'Admin\AdminController@users')->name('admin.users');
    Route::get('/users/add', 'Admin\AdminController@usersForm')->name('admin.users.add');
    Route::post('/users/post', 'Admin\AdminController@usersPost')->name('admin.users.post');
    Route::get('/users/edit/{id}', 'Admin\AdminController@usersEdit')->name('admin.users.edit');
    Route::get('/users/delete/{id}', 'Admin\AdminController@usersdelete')->name('admin.users.delete');


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

Route::get('/business-list/', 'User\ListController@businessList')->name('businessList');
Route::get('/business-list/edit/{id}', 'User\ListController@businessListEdit')->name('businessListEdit');
Route::post('/business-list', 'User\ListController@businessPost')->name('businessPost');
Route::get('/business-keyword/{listing_id?}/{cat_id?}', 'User\ListController@businessKeyword')->name('businessKey');
Route::post('/final-list', 'User\ListController@finalPost')->name('finalPost');
Route::post('/list', 'User\ListController@list')->name('user.list');
Route::post('/lead/user/post', 'User\ListController@leadUserPost')->name('lead.user.post');
Route::get('user/ajax/{id}/{type}', 'User\ListController@ajax')->name('user.ajax');
Route::get('/business-detail/{id?}', 'User\ListController@businessdetail')->name('businessdetail');
