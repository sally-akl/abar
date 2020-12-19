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

Route::middleware(['XSS'])->group(function () {
  Route::get('/',['uses'=>'HomeController@index']);
  Route::get('/aboutus/{text}',['uses'=>'HomeController@aboutus']);
  Route::get('/profile/{text}/{marker_code?}',['uses'=>'HomeController@profolio']);
  Route::get('/blog/{text}',['uses'=>'HomeController@blog']);
  Route::get('/blog/details/{id}/{text}',['before' => 'csrf','uses'=>'HomeController@blog_details']);
  Route::post('/blog/comments',['before' => 'csrf','uses'=>'HomeController@add_blog_comment']);
  Route::get('/store/{title}',['uses'=>'HomeController@store']);
  Route::get('/store/category/show/{type}',['uses'=>'HomeController@store_by_category']);
  Route::get('/project/details/{id}/{title}',['uses'=>'HomeController@project_details']);
  Route::get('/project/request/{type}/{id}',['uses'=>'HomeController@request_project']);
  Route::post('/project/add/favorate',['uses'=>'HomeController@add_to_fav']);
  Route::post('/request/customer/add',['uses'=>'HomeController@add_customer_request']);
  Route::get('/request/done',['uses'=>'HomeController@done']);
  Route::get('/store/city/show',['uses'=>'HomeController@store_by_city']);
  Route::get('/contact-us',['uses'=>'HomeController@contactus']);
  Route::post('/contactus/send',['uses'=>'HomeController@send_contact_us']);
  Route::get('/questions',['uses'=>'HomeController@questions']);
  Route::get('/auth-customer',['uses'=>'HomeController@auth_customer']);
  Route::post('/signin',['uses'=>'HomeController@sign_in']);
  Route::post('/signout',['uses'=>'HomeController@sign_out']);



});




Route::group(['before' => 'auth.basic','prefix'=>'dashboard'],function () {

  Route::get('/',['uses'=>'Dashboard\DashboardController@index']);
  Route::get('/settings',['uses'=>'Dashboard\DashboardController@settings']);
  Route::post('/settings/update',['uses'=>'Dashboard\DashboardController@settings']);
  Route::resource('country','Dashboard\CountryController');
  Route::resource('governate','Dashboard\GovernateController');
  Route::resource('region','Dashboard\RegionController');
  Route::resource('district','Dashboard\DistrictController');
  Route::resource('customer','Dashboard\CustomerController');
  Route::resource('marketer','Dashboard\MarketerController');
  Route::resource('requests','Dashboard\RequestsController');
  Route::resource('customercontracts','Dashboard\ContractsController');
  Route::resource('projects','Dashboard\ProjectController');
  Route::resource('extrafields','Dashboard\ExtraFieldsController');
  Route::resource('media','Dashboard\MediaController');
  Route::resource('visits','Dashboard\VisitsController');
  Route::resource('opionion','Dashboard\CustomerOpionController');
  Route::resource('blog','Dashboard\BlogController');
  Route::post('project/update/{id}',['uses'=>'Dashboard\ProjectController@update']);
  Route::post('blogs/update/{id}',['uses'=>'Dashboard\BlogController@update']);
  Route::get('blogs/comments/{id}',['uses'=>'Dashboard\BlogController@comments']);
  Route::get('blogs/comments/delete/{id}',['uses'=>'Dashboard\BlogController@delete_comments']);
  Route::post('blogs/comments/update/{id}',['uses'=>'Dashboard\BlogController@update_comment']);
  Route::get('visit/accept/{id}',['uses'=>'Dashboard\VisitsController@acceptVisit']);
  Route::post('visit/reject/{id}',['uses'=>'Dashboard\VisitsController@rejectVisit']);
  Route::get('project/status/{id}',['uses'=>'Dashboard\ProjectController@projectByStatus']);
  Route::get('project/withoutcontract',['uses'=>'Dashboard\ProjectController@projectsNotHasContracts']);
  Route::get('customercontracts/requests/create/{id}',['uses'=>'Dashboard\ContractsController@add']);
  Route::get('customercontracts/contract/sign/{id}',['uses'=>'Dashboard\ContractsController@sendCustomerToSign']);
  Route::get('/governates/{id}',['uses'=>'Dashboard\RegionController@getGovsUnderCountry']);
  Route::get('/regions/{id}',['uses'=>'Dashboard\DistrictController@getRegUnderGovernate']);
  Route::get('reports',['uses'=>'Dashboard\ReportController@index']);
  Route::get('reports/sell',['uses'=>'Dashboard\ReportController@sellProjects']);
  Route::group(['prefix'=>'customers'],function () {
    Route::get('projects/favorate',['uses'=>'Dashboard\ProjectController@customerFavProjects']);
    Route::get('projects',['uses'=>'Dashboard\ProjectController@customerprojects']);
    Route::get('/',['uses'=>'Dashboard\CustomerController@profile']);
    Route::post('/updateprofile/{id}',['uses'=>'Dashboard\CustomerController@updateProfile']);
    Route::get('projects/details/{id}',['uses'=>'Dashboard\ProjectController@showProjectDetails']);
    Route::get('requests/{id}',['uses'=>'Dashboard\RequestsController@updateCustomerRequest']);

  });
  Route::group(['prefix'=>'marketers'],function () {
    Route::get('projects',['uses'=>'Dashboard\MarketerAreaController@projects']);
    Route::get('customers',['uses'=>'Dashboard\MarketerAreaController@customers']);
    Route::post('send/email',['uses'=>'Dashboard\MarketerAreaController@sendCustomerEmail']);
    Route::resource('banner','Dashboard\BannerController');
    Route::post('banners/uploadImage/{id}','Dashboard\BannerController@uploadImage');
    Route::resource('link','Dashboard\LinkController');
    Route::resource('vedio','Dashboard\VedioController');
    Route::resource('text','Dashboard\TextController');
  });

});
Auth::routes();
