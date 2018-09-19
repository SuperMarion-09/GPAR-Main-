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



//Main Index
Route::get('/admin/index', 'UserController@index')->name('home');
Route::get('/admin/manage/view_staff', 'UserController@viewStaff');
Route::get('/admin/others/logs', 'UserController@logs');
Route::get('/admin/others/feedbacks', 'UserController@feedbacks');
Route::get('/admin/others/resort_setting', 'UserController@resortSetting');
Route::get('/admin/settings/profile', 'UserController@profileSetting');
Route::get('/admin/settings/profile/edit', 'UserController@editProfile');
Route::patch('/admin/settings/profile/edit/user', 'UserController@updateProfile');

//Adding Staff
Route::get('/admin/manage/add_staff', 'UserController@addStaff');
Route::post('/admin/manage/add_staff/add','StaffController@storeStaff');

//Event
Route::get('/admin/event/add_items', 'EventsController@addItem');
Route::post('/admin/event/add_items', 'EventsController@storeItem');
Route::get('/admin/event/view_items', 'EventsController@viewItem');
Route::delete('/admin/event/delete/{id}', 'EventsController@destroy');
Route::post('/admin/event/update/others', 'EventsController@updateOthers');
Route::get('/admin/event/edit/{id}', 'EventsController@editEvent');
Route::patch('/admin/event/update/{id}', 'EventsController@updateEvent');
Route::post('/admin/event/update/item_status', 'EventsController@updateItemStatus');
Route::get('/admin/event/retrieve/{id}', 'EventsController@retrieve');






//Pools
Route::get('/admin/pool/add_pools', 'PoolsController@addPool');
Route::post('/admin/pool/add_pools', 'PoolsController@store');
Route::get('/admin/pool/view_pools', 'PoolsController@viewPool');
Route::delete('/admin/pool/delete/event', 'PoolsController@destroy');
Route::get('/admin/pool/edit/{id}', 'PoolsController@edit');
Route::patch('/admin/pool/edit/{id}', 'PoolsController@update');
Route::get('/admin/pool/retrieve/{id}', 'PoolsController@retrieve');





//Rooms
Route::get('/admin/room/view_rooms', 'RoomsController@viewRooms');
Route::delete('/admin/room/delete/{id}', 'RoomsController@destroy');
Route::get('/admin/room/add_rooms', 'RoomsController@addRooms');
Route::post('/admin/room/add_rooms', 'RoomsController@storeRoom');
Route::get('/admin/room/edit/{id}', 'RoomsController@edit');
Route::patch('/admin/room/edit/{id}', 'RoomsController@update');
Route::get('/admin/room/retrieve/{id}', 'RoomsController@retrieve');


//Reservation
Route::get('/admin/reservation/add_reservation', 'ReservationController@addReservation');

Route::post('/admin/reservation/add_reservation/check', 'ReservationController@checkdate');

Route::get('/admin/reservation/view_reservation', 'ReservationController@viewReservation');
Route::post('/admin/reservation/summary', 'ReservationController@summary')->name('reservation_summary');
Route::post('/admin/reservation/summary/pay', 'ReservationController@acceptReservation');

//Gallery
Route::get('/admin/gallery/add_gallery', 'GalleryController@addGallery');
Route::get('/admin/gallery/view_gallery', 'GalleryController@viewGallery');
Route::get('/admin/album/{album_name}/view_images', 'GalleryController@viewAlbumImage');
Route::get('/admin/album/{album_name}/add_images', 'GalleryController@addAlbumImage');


//customer
Route::get('/','CustomerController@index');
Route::get('/amenities-pool','CustomerController@a_pool');
Route::get('/amenities-room','CustomerController@a_room');
Route::get('/amenities-event','CustomerController@a_event');

Route::get('/gallery','CustomerController@gallery');
Route::get('/contact-us','CustomerController@contact_us');
Route::get('/about-us','CustomerController@about_us');

//reservation
Route::get('/reservation','CustomerReservationController@show');
Route::post('/reservation/checkdate', 'CustomerReservationController@check');
Route::post('/reservation/summary', 'CustomerReservationController@customer_summary');
Route::post('/reservation/summary/cash', 'CustomerReservationController@storeReserve');
