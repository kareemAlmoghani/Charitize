<?php
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CauseController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\GalleryController;
use App\Http\Controllers\Dashboard\DonationsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\StatisticController;
use App\Http\Controllers\Dashboard\TeamController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Notifications\NewDonation;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale())->group(function (){

Route::name('front.')->group(function(){
Route::get('/',[MainController::class,'index'])->name('index');
Route::get('/about',[MainController::class,'about'])->name('about');
Route::get('/service',[MainController::class,'service'])->name('service');
Route::get('/donation',[MainController::class,'donation'])->name('donation');
Route::get('/event',[MainController::class,'event'])->name('event');
Route::get('/feature',[MainController::class,'feature'])->name('feature');
Route::get('/team',[MainController::class,'team'])->name('team');
Route::get('/testimonial',[MainController::class,'testimonial'])->name('testimonial');
Route::get('/contact',[MainController::class,'contact'])->name('contact');
Route::post('/contact',[MainController::class,'contact_data']);
Route::post('/subscribe',[MainController::class,'subscribe'])->name('subscribe');
Route::get('/donate/{cause}',[PaymentController::class,'donate'])->name('donate');
Route::post('/donate',[PaymentController::class,'donate_process'])->name('donate_process');
Route::get('/donation/success',[PaymentController::class,'donate_success'])->name('donate_success');
Route::get('/donation/cancel',[PaymentController::class,'donate_cancel'])->name('donate_cancel');

});
// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth','verified','admin'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // روابط لعمل العمليات على الجداول المضافة للوحة التحكم
    Route::prefix('dashboard')->name('dashboard.')->group(function(){
    Route::resource('categories',CategoryController::class);
    Route::resource('causes',CauseController::class);
    Route::get('causes/{cause}/delete/{image}/image',[CauseController::class,'delete_gallery'])->name('delete_gallery');
    Route::resource('events',EventController::class);
    Route::resource('galleries',GalleryController::class);
    Route::resource('services',ServiceController::class);
    Route::resource('sliders',SliderController::class);
    Route::resource('statistics',StatisticController::class);
    Route::resource('teams',TeamController::class);
    Route::resource('testimonials',TestimonialController::class);
    Route::get('messages',[DashboardController::class,'messages'])->name('messages');
    Route::delete('messages/{message}',[DashboardController::class,'delete_messages'])->name('delete_messages');
    Route::get('subscriptions',[DashboardController::class,'subscriptions'])->name('subscriptions');
    Route::delete('subscriptions/{subscription}',[DashboardController::class,'delete_subscriptions'])->name('delete_subscriptions');
    Route::get('donations',[DonationsController::class,'donations'])->name('donations');
    Route::delete('donations/{payment}/delete',[DonationsController::class,'delete_donations'])->name('delete_donations');
    Route::get('donners',[DonationsController::class,'donners'])->name('donners');
    Route::delete('donners/{user}',[DonationsController::class,'delete_donners'])->name('delete_donners');
    Route::get('settings',[DashboardController::class,'settings'])->name('settings');
    Route::put('settings',[DashboardController::class,'settings_update']);
    Route::get('notifications',[DashboardController::class,'notifications'])->name('notifications');
    Route::get('notifications/{notification}',[DashboardController::class,'notifications_read'])->name('notifications_read');
    });
});

require __DIR__.'/auth.php';
});


// notifications test route
Route::get('send-notify',function(){
    // for one admin by using first()
    // $admin=User::where('type','admin')->first();
    // $admin->notify(new NewDonation());

    // for multible admin by using get()
    $admins=User::where('type','admin')->get();
    Notification::send($admins,new NewDonation());
});
