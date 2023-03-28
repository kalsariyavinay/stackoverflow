<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VotController;
use App\Http\Controllers\RazorpayController;

// Auth Route login,register,reset etc....
Auth::routes([
  'verify'=> true
]);

// Extra Ordinery
Route::get('tests', [App\Http\Controllers\TestController::class, 'index']);


// Opensource route section
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('all-questions', [HomeController::class, 'all_questions'])->name('all_questions');
Route::post('user/adminloginpost', [HomeController::class, 'userloginpost'])->name('userLoginPost');
Route::get('question-details/{id}', [HomeController::class, 'quedetails'])->name('quedetails');
Route::get('tagsss/{tag}', [HomeController::class, 'tagsss'])->name('tagsss');
Route::get('tags', [HomeController::class, 'tags'])->name('tags');
Route::get('package', [HomeController::class, 'package'])->name('package');
Route::get('View-Details/{id}', [HomeController::class, 'viewdetails'])->name('viewdetails');
Route::get('hire', [HomeController::class, 'hire'])->name('hire');
Route::get('About-Us', [HomeController::class, 'about'])->name('about');
Route::get('user-list', [HomeController::class, 'userlist'])->name('userlist');
Route::get('Privacy-Policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('Terms-Conditions', [HomeController::class, 'terms_conditions'])->name('terms_conditions');

// Login enter(Auth) route section 
Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
  Route::get('ask', [HomeController::class, 'ask'])->name('ask');
  Route::get('logout', [HomeController::class, 'perform'])->name('logout.perform');
  Route::get('my-question', [HomeController::class, 'myquestion'])->name('myquestion');
  Route::get('Contact-Us', [HomeController::class, 'contact'])->name('contact');
  Route::get('user-profile/{id}', [HomeController::class, 'userprofile'])->name('user_profile');
  Route::get('Buy-Now/{id}', [HomeController::class, 'buynow'])->name('buynow');
  Route::get('mail', [HomeController::class,'show']);
  // Route::get('most-answered', [HomeController::class, 'answer'])->name('most_answered');
  Route::get('edit-profile/', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit_user');
  Route::get('job-post', [HomeController::class, 'job_post'])->name('job_post');
  Route::resource('job', JobpostController::class);
  // Razorpay controller
  Route::get('product', [RazorpayController::class, 'index']);
  Route::post('razorpay-payment', [RazorpayController::class, 'store'])->name('razorpay.store');
  //  Question section
  Route::resource('questions', QuestionController::class);
  // Answer section
  Route::resource('answers', AnswerController::class);
  // Comment section
  Route::resource('comments', CommentController::class);
  // Profile section
  Route::resource('profile', ProfileController::class);
  Route::get('profile/delete/{id}', [App\Http\Controllers\ProfileController::class, 'delete'])->name('profile.delete');
  // contact controller
  Route::resource('admin/contacts', ContactController::class);
  // Vot section
  Route::get('up-vot-q/{id}', [VotController::class, 'up_vot_q'])->name('up_vot_q');
  Route::get('down-vot-q/{id}', [VotController::class, 'down_vot_q'])->name('down_vot_q');
  Route::get('up-vot-a/{id}/{a_id}', [VotController::class, 'up_vot_a'])->name('up_vot_a');
  Route::get('down-vot-a/{id}/{a_id}', [VotController::class, 'down_vot_a'])->name('down_vot_a');
  Route::get('best-answer-id/{id}/{a_id}', [VotController::class, 'best_answer_id'])->name('best_answer_id');
  Route::resource('vots', VotController::class);
});


// Admin routes section
Route::get('/admin/login', [HomeController::class, 'adminlogin'])->name('adminlogin');
Route::post('admin/', [HomeController::class, 'adminloginpost'])->name('adminLoginPost');
Route::group(['prefix' => 'admin', 'middleware' => 'adminauth'], function () {

  Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
  // Tag controller
  Route::resource('tag', TagController::class);
  Route::get('tag/delete/{id}', [App\Http\Controllers\TagController::class, 'delete'])->name('tag.delete');

  // about controller
  Route::resource('abouts', AboutController::class);
  // Package controller
  Route::resource('package', PackageController::class);
  Route::get('package/status-update/{id}/{status}', [App\Http\Controllers\PackageController::class, 'status_update'])->name('package.status_update');
  Route::get('package/delete/{id}', [App\Http\Controllers\PackageController::class, 'delete'])->name('package.delete');
});
