<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegController;
use App\Http\Controllers\medicaldropdownController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AdminLoginController::class, 'Login'])->name('login');
Route::post('/do-login', [AdminLoginController::class, 'DoLogin'])->name('dologin');

Route::group(['middleware' => 'admin_auth'], function () {
    //change password
    Route::get('/change-password', [AdminLoginController::class, 'ChangePassword'])->name('changepassword');
    Route::post('/change-password-save', [AdminLoginController::class, 'ChangePasswordSave']);

    Route::get('/logout', [AdminLoginController::class, 'LoggedOut'])->name('logout');
    //admin-dashboard-home
    Route::get('/', [AdminController::class, 'AdminHome'])->name('adminhome');
    //user-registration
    Route::get('/user-list', [AdminRegController::class, 'UserList'])->name('userlist');
    Route::post('/user-reg-save', [AdminRegController::class, 'UserRegSave']);
    Route::post('/user-reg-update', [AdminRegController::class, 'UserRegUpdate']);
    Route::post('/user-reg-delete', [AdminRegController::class, 'UserRegDelete']);
    Route::post('/user-change-pwd', [AdminRegController::class, 'UserChangePwd'])   ;
    //profile-section-user
    Route::get('/user-profile/{id}', [AdminRegController::class, 'UserProfile'])->name('userprofile');
    Route::post('/profile-delete', [AdminRegController::class, 'profileDelete']);

    Route::get('/profile-edit/{id}/{user_id}', [AdminRegController::class, 'profileEdit'])->name('profiledit');

    Route::post('/profile-user-update', [AdminRegController::class, 'profileuserUpdate']);
    Route::post('/profile-business-update', [AdminRegController::class, 'profilebusinessUpdate']);

    Route::get('/profile/{id}', [AdminRegController::class, 'Profile'])->name('profile');

    Route::post('/profile-dropdown-save', [medicaldropdownController::class, 'dropdownSave']);
    Route::post('/get-conditions',[medicaldropdownController::class,'getConditions']);

    Route::post('/profile-dropdown-allergy-save', [medicaldropdownController::class, 'dropdownallergySave']);
    Route::post('/get-allergy',[medicaldropdownController::class,'getAllergy']);

    Route::post('/profile-industry-save', [medicaldropdownController::class, 'dropdownIndustrySave']);
    Route::post('/get-industry',[medicaldropdownController::class,'getIndustry']);

    Route::post('/profile-save', [AdminRegController::class, 'ProfileSave']);

    Route::post('/crop-image-upload-ajax', [AdminRegController::class, 'cropImageUploadAjax']);
    Route::post('/crop-image-upload-ajax-business', [AdminRegController::class, 'cropImageUploadBusinessAjax']);

    Route::post('/profile-save-bus', [AdminRegController::class, 'ProfileSaveBus']);

    Route::get('/preview/{id}', [AdminRegController::class, 'ProfilePreview'])->name('profilepreviw');
    // //themes
    Route::get('/theme1', [AdminRegController::class, 'Theme1'])->name('theme1');
    Route::get('/theme2', [AdminRegController::class, 'Theme2'])->name('theme2');
    Route::get('/theme3', [AdminRegController::class, 'Theme3'])->name('theme3');
    Route::get('/theme4', [AdminRegController::class, 'Theme4'])->name('theme4');
     //campany-registration
    Route::get('/campany-reg-list', [AdminRegController::class, 'CampanyRegList'])->name('campanylist');
    Route::post('/campany-reg-save', [AdminRegController::class, 'CampanyRegSave']);
    Route::post('/campany-reg-update', [AdminRegController::class, 'CampanyRegUpdate']);
    Route::post('/campany-change-pwd', [AdminRegController::class, 'CampanyChangePwd']);
    Route::post('/campany-reg-delete', [AdminRegController::class, 'CampanyRegDelete']);
});


