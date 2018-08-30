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

Route::get('/admin', function () {
    return view('admin.login');
});
Route::post('/admin','SessionController@create');
Route::get('/admin/logout','SessionController@destroy');

Route::get('/admin/register', 'RegisterController@show');
Route::post('/admin/register', 'RegisterController@create');

//Main Index
Route::get('/admin/index', 'UserController@index')->name('home');
Route::get('/admin/manage/view_admin', 'UserController@viewAdmin');
Route::get('/admin/manage/view_customer', 'UserController@viewCustomer');
Route::get('/admin/others/logs', 'UserController@logs');
Route::get('/admin/others/feedbacks', 'UserController@feedbacks');
Route::get('/admin/others/resort_setting', 'UserController@resortSetting');





//Pools
Route::get('/admin/pool/add_pools', 'PoolsController@addPool');
Route::post('/admin/pool/add_pools', 'PoolsController@store');

Route::get('/admin/pool/view_pools', 'PoolsController@viewPool');



//Rooms
Route::get('/admin/room/add_rooms', 'RoomsController@addRooms');
Route::post('/admin/room/add_rooms', 'RoomsController@storeRoom');

Route::get('/admin/room/view_rooms', 'RoomsController@viewRooms');

//Reservation
Route::get('/admin/reservation/add_reservation', 'ReservationController@addReservation');
Route::get('/admin/reservation/view_reservation', 'ReservationController@viewReservation');


//Gallery
Route::get('/admin/gallery/add_gallery', 'GalleryController@addGallery');
Route::get('/admin/gallery/view_gallery', 'GalleryController@viewGallery');
Route::get('/admin/album/{album_name}/view_images', 'GalleryController@viewAlbumImage');
Route::get('/admin/album/{album_name}/add_images', 'GalleryController@addAlbumImage');


//customer
Route::get('/','CustomerController@index');
Route::get('/amenities-pool','CustomerController@a_pool');
Route::get('/amenities-room','CustomerController@a_room');
Route::get('/reservation','CustomerReservationController@show');
Route::get('/gallery','CustomerController@gallery');
Route::get('/contact-us','CustomerController@contact_us');
Route::get('/about-us','CustomerController@about_us');
