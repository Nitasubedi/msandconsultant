<?php

use App\ArticleType;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTypeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MediaTypesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;

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

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/service', [FrontController::class, 'service'])->name('service');
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/gallery', [FrontController::class, 'gallery'])->name('gallery');

Route::post('contact/store', [FrontController::class, 'storeContact'])->name('contact.store');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

Route::resource('admin/article_type', 'ArticleTypeController');

Route::resource('admin/media_type', 'MediaTypesController');

Route::resource('admin/service_type', 'ServiceTypeController');

Route::resource('admin/company', 'CompanyController', [
    'except' => ['create']
]);

Route::resource('admin/article', 'ArticleController');

Route::resource('admin/media', 'MediaController');

Route::resource('admin/service', 'ServiceController');

Route::resource('admin/faq', 'FAQController');

Route::resource('admin/testimonial', 'TestimonialController');

Route::resource('admin/social_media', 'SocialMediaController');

Route::resource('admin/team', 'TeamController');

Route::resource('admin/users', 'UserController');

Route::resource('admin/gallery', 'GalleryController');

Route::get('admin/profile', [ProfileController::class, 'view'])->name('view_profile');
Route::put('admin/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::get('admin/change_password', [ProfileController::class, 'viewChangePw'])->name('view_change_password');
Route::post('admin/changePw/{id}', [ProfileController::class, 'changePw'])->name('change_password');

Route::get('admin/contact', [ContactController::class, 'index'])->name('contact.index');
Route::delete('contact/destroy/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');

Route::get('admin/article_type/inactive/{id}', [ArticleTypeController::class, 'inactive'])->name('article_type.inactive');
Route::get('admin/article_type/active/{id}', [ArticleTypeController::class, 'active'])->name('article_type.active');

Route::get('admin/media_type/inactive/{id}', [MediaTypesController::class, 'inactive'])->name('media_type.inactive');
Route::get('admin/media_type/active/{id}', [MediaTypesController::class, 'active'])->name('media_type.active');

Route::get('admin/service_type/inactive/{id}', [ServiceTypeController::class, 'inactive'])->name('service_type.inactive');
Route::get('admin/service_type/active/{id}', [ServiceTypeController::class, 'active'])->name('service_type.active');

Route::get('admin/article/inactive/{id}', [ArticleController::class, 'inactive'])->name('article.inactive');
Route::get('admin/article/active/{id}', [ArticleController::class, 'active'])->name('article.active');

Route::get('admin/media/inactive/{id}', [MediaController::class, 'inactive'])->name('media.inactive');
Route::get('admin/media/active/{id}', [MediaController::class, 'active'])->name('media.active');

Route::get('admin/service/inactive/{id}', [ServiceController::class, 'inactive'])->name('service.inactive');
Route::get('admin/service/active/{id}', [ServiceController::class, 'active'])->name('service.active');

Route::get('admin/faq/inactive/{id}', [FAQController::class, 'inactive'])->name('faq.inactive');
Route::get('admin/faq/active/{id}', [FAQController::class, 'active'])->name('faq.active');

Route::get('admin/testimonial/inactive/{id}', [TestimonialController::class, 'inactive'])->name('testimonial.inactive');
Route::get('admin/testimonial/active/{id}', [TestimonialController::class, 'active'])->name('testimonial.active');

// routes/web.php

Route::prefix('admin')->group(function () {
    Auth::routes();
});

Route::get('/home', 'HomeController@index')->name('home');
