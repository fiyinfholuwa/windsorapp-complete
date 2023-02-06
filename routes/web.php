<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\MyBookingController;
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
//     return view('welcome');
// });

Route::get('/redirect', [AdminController::class, 'redirect'])->middleware(['auth', 'verified'])->name('redirect');
Route::get('/dashboard', [AdminController::class, 'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get("/", [HomeController::class, 'index'])->name('home');

Route::get("/apartments", [RoomsController::class, 'showRooms'])->name('rooms');

Route::get("/about", [AboutController::class, 'showAbout'])->name('about');

Route::get("/jobs", [JobsController::class, 'showJobs'])->name('jobs');
Route::get("/job/add", [JobsController::class, 'addJob'])->name('job.add');
Route::get("/job/all", [JobsController::class, 'allJobs'])->name('jobs.all');
Route::get("/job/apply/all", [JobsController::class, 'jobApplyAll'])->name('jobs.apply.all');
Route::post("/job/store", [JobsController::class, 'storeJob'])->name('job.store');
Route::post("/job/delete/{id}", [JobsController::class, 'jobDelete'])->name('job.delete');
Route::get("/job/edit/{id}", [JobsController::class, 'jobEdit'])->name('job.edit');
Route::post("/job/update/{id}", [JobsController::class, 'jobUpdate'])->name('job.update');
Route::get("/job/details/{title}", [JobsController::class, 'jobDetails'])->name('job.details');
Route::post("/job/apply/user", [JobsController::class, 'applyJob'])->name('job.apply');
Route::post("/job/apply/delete/{id}", [JobsController::class, 'applyDelete'])->name('apply.delete');


// contact routes 
Route::get("/contact", [ContactController::class, 'showContact'])->name('contact');
Route::post("/store-messgae", [ContactController::class, 'storeMessage'])->name('store.message');
Route::get("/messages/all", [ContactController::class, 'showMessagesAdmin'])->name('messages.all');
Route::post("/messages/delete/{id}", [ContactController::class, 'deleteMessage'])->name('delete.message');

// testimonials 

Route::get("/testimonial/create", [TestimonialController::class, 'addTestimonial'])->name('testimonial.view');
Route::post("/testimonial/store", [TestimonialController::class, 'storeTestimonial'])->name('store.testimony');
Route::post("/testimonial/delete{id}", [TestimonialController::class, 'testimonialDelete'])->name('delete.testimonial');
Route::get("/testimonial/all", [TestimonialController::class, 'allTestimonials'])->name('testimonial.all');
Route::get("/testimonial/edit/{id}", [TestimonialController::class, 'editTestimonial'])->name('testimonial.edit');
Route::post("/testimonial/updaate/{id}", [TestimonialController::class, 'updateTestimonial'])->name('testimonial.update');

// room managements 

Route::get("/manage/room/label", [RoomsController::class, 'view_room_manage'])->name('room.manage');
Route::post("/room/label/store", [RoomsController::class, 'storeLabel'])->name('store.label');
Route::get("/room/label/edit/{id}", [RoomsController::class, 'editLabel'])->name('edit.label');
Route::post("/room/label/delete/{id}", [RoomsController::class, 'deleteLabel'])->name('delete.label');
Route::post("/room/label/update/{id}", [RoomsController::class, 'updateLabel'])->name('update.label');

Route::get("/add/room", [RoomsController::class, 'addRoom'])->name('add.room');
Route::post("/store/room", [RoomsController::class, 'storeRoom'])->name('store.room');
Route::get("/all/room", [RoomsController::class, 'allRooms'])->name('all.room');
Route::get("/edit/room/{id}", [RoomsController::class, 'editRoom'])->name('room.edit');
Route::post("/delete/room/{id}", [RoomsController::class, 'deleteRoom'])->name('delete.room');
Route::post("/update/room/{id}", [RoomsController::class, 'updateRoom'])->name('update.room');
Route::get("/apartment/details/{name}", [RoomsController::class, 'roomDetails'])->name('room.detail');

Route::post("/review/add", [RoomsController::class, 'storeReview'])->name('store.review');
Route::get("/review/all", [RoomsController::class, 'allReview'])->name('review.all');
Route::post("/review/delete/{id}", [RoomsController::class, 'deleteReview'])->name('review.delete');

// make payment 

Route::post('/pay', [App\Http\Controllers\OrderController::class, 'makePayment'])->name('pay');
Route::post('/make/payment', [App\Http\Controllers\OrderController::class, 'make_payment_online'])->name('make.payment.online');
Route::get('/payment/callback', [App\Http\Controllers\OrderController::class, 'paymentCallback'])->name('pay.callback');

// my booking 
Route::get('/booking/all', [MyBookingController::class, 'bpage'])->name('booking.user');

Route::get('/booking/payment/{id}', [MyBookingController::class, 'make_payment'])->name('make.payment');

Route::get('/booking/{id}', [MyBookingController::class, 'download_invoice'])->name('invoice.generate');

Route::post('/payment/confirm', [MyBookingController::class, 'payment_confirm'])->name('payment.confirm');

Route::get('/payment/confirm/admin', [MyBookingController::class, 'payment_confirm_admin'])->name('payment.confirm.admin');

Route::get('/payment/confirm/edit/{id}', [MyBookingController::class, 'payment_confirm_admin_edit'])->name('confirm.edit');

Route::post('/payment/confirm/delete/{id}', [MyBookingController::class, 'payment_confirm_admin_delete'])->name('confirm.delete');
Route::post('/payment/confirm/update/{id}', [MyBookingController::class, 'payment_confirm_admin_update'])->name('confirm.update');


Route::post('/booking/admin/delete/{id}', [MyBookingController::class, 'booking_admin_delete'])->name('booking.delete');

Route::get('/booking/admin/all', [MyBookingController::class, 'all_booking_admin'])->name('admin.booking.all');

Route::get('/booking/admin/edit/{id}', [MyBookingController::class, 'booking_admin_edit'])->name('booking.edit');
Route::post('/booking/admin/update/{id}', [MyBookingController::class, 'booking_admin_update'])->name('update.booking');
Route::post('/booking/admin/delete/{id}', [MyBookingController::class, 'booking_admin_delete'])->name('booking.delete');


Route::get('/booking/admin/reservations', [MyBookingController::class, 'booking_admin_reservations'])->name('booking.reservations');


// user management 

Route::get('/user/add', [AdminController::class, 'add_user'])->name('add.user');
Route::post('/user/store', [AdminController::class, 'store_user'])->name('store.user');
Route::get('/user/all', [AdminController::class, 'all_users'])->name('all.users');
Route::get('/user/{id}', [AdminController::class, 'edit_user'])->name('user.edit');
Route::post('/user/update/{id}', [AdminController::class, 'update_user'])->name('update.user');
Route::post('/user/delete/{id}', [AdminController::class, 'delete_user'])->name('user.delete');