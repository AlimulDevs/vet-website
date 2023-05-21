<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\WEB\admin\about\AboutController;
use App\Http\Controllers\WEB\admin\AdminViewController;
use App\Http\Controllers\WEB\admin\article\ArticleController;
use App\Http\Controllers\WEB\admin\category_article\CategoryArticleController;
use App\Http\Controllers\WEB\admin\doctor\DoctorController;
use App\Http\Controllers\WEB\admin\facility\FacilityController;
use App\Http\Controllers\WEB\admin\service\ServiceController;
use App\Http\Controllers\WEB\doctor\consultation\ConsultationController;
use App\Http\Controllers\WEB\doctor\DoctorViewController;
use App\Http\Controllers\WEB\user\AuthUserController;
use App\Http\Controllers\Web\user\ConsultationPaymentController;
use App\Http\Controllers\WEB\user\PatientController;
use App\Http\Controllers\WEB\user\pet\PetController;
use App\Http\Controllers\WEB\user\PetController as UserPetController;
use App\Http\Controllers\WEB\user\ReservationController;
use App\Http\Controllers\WEB\user\UserViewController;
use App\Http\Controllers\WEB\ViewController;
use App\Models\ConsultationPayment;
use App\Models\Patient;
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

Route::get('/', [UserViewController::class, 'index']);

Route::prefix('user')->group(function () {
    Route::get('/consultation-index', [UserViewController::class, 'consultationIndex']);
    Route::get('/article-index', [UserViewController::class, 'articleIndex']);
    Route::get('/article-detail/{id}', [UserViewController::class, 'articleDetailIndex']);
    Route::get('/about-index', [UserViewController::class, 'aboutIndex']);
});

Route::get('/logout', [AuthUserController::class, 'logout']);

Route::middleware(['session.user.patient'])->prefix('user')->group(function () {
    // route for view all
    Route::get('/reservation-index', [UserViewController::class, 'reservationIndex']);
    Route::get('/profile-index', [UserViewController::class, 'profileIndex']);
    Route::get('/history-index', [UserViewController::class, 'historyIndex']);
    Route::get('/history/detail-index/{id}', [UserViewController::class, 'historyDetailIndex']);
    Route::get('/pet-index', [UserViewController::class, 'petIndex']);
    Route::get('/consultation/detail-index/{id}', [UserViewController::class, 'consultationDetailIndex']);
    Route::get('/consultation/form-index/{id}', [UserViewController::class, 'consultationFormIndex']);
    // end route view


    Route::post('/edit-profil', [PatientController::class, 'editProfil']);
    Route::post('/edit-photo-profile', [PatientController::class, 'editPhotoProfile']);

    // route for pet
    Route::post('/pet/add', [UserPetController::class, 'add']);
    Route::get('/pet/delete/{id}', [UserPetController::class, 'delete']);
    // end route for pet

    // route for reservation
    Route::post('/reservation/add', [ReservationController::class, 'add']);

    // route for reservation
    Route::post('/consultation-payment/add', [ConsultationPaymentController::class, 'add']);
});


Route::get('/email', [EmailController::class, 'index']);



Route::get('/login-index', [ViewController::class, 'loginIndex'])->name("login-index");
Route::get('/register-index', [ViewController::class, 'registerIndex']);
Route::get('/forgot-password-index', [ViewController::class, 'forgotPasswordIndex']);
Route::get('/change-password-index/{remember_token}', [ViewController::class, 'changePasswordIndex']);
Route::post('/forgot-password', [AuthUserController::class, 'forgotPassword']);
Route::post('/change-password', [AuthUserController::class, 'changePassword']);
Route::post('/register', [AuthUserController::class, 'register']);
Route::post('/login', [AuthUserController::class, 'login']);


// end route for view all

// route for view user
Route::prefix('user')->group(function () {
});

Route::middleware(['session.user.admin'])->prefix('admin')->group(function () {

    // route for view admin
    Route::get('/', [AdminViewController::class, 'index']);

    // route consultation admin
    Route::get('/consultation-index', [AdminViewController::class, 'consultationIndex']);
    Route::get('/consultation/detail-index/{id}', [AdminViewController::class, 'consultationDetailIndex']);
    // end route consultation admin

    // route consultation admin
    Route::get('/consultation-payment-index', [AdminViewController::class, 'consultationPaymentIndex']);

    // end route consultation admin

    // route reservation admin
    Route::get('/reservation-index', [AdminViewController::class, 'reservationIndex']);
    Route::get('/reservation/detail-index/{id}', [AdminViewController::class, 'reservationDetailIndex']);
    // end route reservation admin

    // route doctor admin
    Route::get('/doctor-index', [AdminViewController::class, 'doctorIndex']);
    Route::get('/doctor/add-index', [AdminViewController::class, 'doctorAddIndex']);
    Route::get('/doctor/edit-index/{id}', [AdminViewController::class, 'doctorEditIndex']);
    // end route doctor admin

    // route user admin
    Route::get('/patient-index', [AdminViewController::class, 'patientIndex']);
    Route::get('/patient/add-index', [AdminViewController::class, 'patientAddIndex']);
    Route::get('/patient/detail-index/{id}', [AdminViewController::class, 'patientDetailIndex']);
    Route::get('/patient/medical-record/{id}', [AdminViewController::class, 'medicalRecordIndex']);
    Route::post('/patient/record-add', [ReservationController::class, 'recordAdd']);
    // end route user admin

    // route article admin
    Route::get('/article-index', [AdminViewController::class, 'articleIndex']);
    Route::get('/article/add-index', [AdminViewController::class, 'articleAddIndex']);
    Route::get('/article/edit-index/{id}', [AdminViewController::class, 'articleEditIndex']);
    // end route article admin

    // route article admin
    Route::get('/facility-index', [AdminViewController::class, 'facilityIndex']);
    Route::get('/facility/add-index', [AdminViewController::class, 'facilityAddIndex']);
    Route::get('/facility/edit-index/{id}', [AdminViewController::class, 'facilityEditIndex']);
    // end route article admin

    // route category-article admin
    Route::get('/category-article-index', [AdminViewController::class, 'categoryArticleIndex']);
    Route::get('/category-article/add-index', [AdminViewController::class, 'categoryArticleAddIndex']);
    Route::get('/category-article/edit-index/{id}', [AdminViewController::class, 'categoryArticleEditIndex']);
    // end route category-article admin

    // route service admin
    Route::get('/service-index', [AdminViewController::class, 'serviceIndex']);
    Route::get('/service/add-index', [AdminViewController::class, 'serviceAddIndex']);
    Route::get('/service/edit-index/{id}', [AdminViewController::class, 'serviceEditIndex']);
    // end route service admin

    // route about admin
    Route::get('/about-index', [AdminViewController::class, 'aboutIndex']);
    Route::get('/about/add-index', [AdminViewController::class, 'aboutAddIndex']);
    Route::get('/about/edit-index/{id}', [AdminViewController::class, 'aboutEditIndex']);
    // end route about admin

    // crud

    // route crud category-article admin
    Route::post('/category-article/add', [CategoryArticleController::class, 'add']);
    Route::post('/category-article/edit', [CategoryArticleController::class, 'edit']);
    Route::get('/category-article/delete/{id}', [CategoryArticleController::class, 'delete']);
    // route crud category-article admin


    // route crud consultation admin
    Route::get('/consultation/delete/{id}', [ConsultationController::class, 'delete']);
    // end route crud consultation admin

    // route crud service admin
    Route::post('/service/add', [ServiceController::class, 'add']);
    Route::post('/service/edit', [ServiceController::class, 'edit']);
    Route::get('/service/delete/{id}', [ServiceController::class, 'delete']);
    // route crud service admin

    // route crud article admin
    Route::post('/article/add', [ArticleController::class, 'add']);
    Route::post('/article/edit', [ArticleController::class, 'edit']);
    Route::get('/article/delete/{id}', [ArticleController::class, 'delete']);
    // route crud article admin

    // route crud facility admin
    Route::post('/facility/add', [FacilityController::class, 'add']);
    Route::post('/facility/edit', [FacilityController::class, 'edit']);
    Route::get('/facility/delete/{id}', [FacilityController::class, 'delete']);
    // route crud facility admin

    // route crud about admin
    Route::post('/about/add', [AboutController::class, 'add']);
    Route::post('/about/edit', [AboutController::class, 'edit']);
    Route::get('/about/delete/{id}', [AboutController::class, 'delete']);
    // route crud about admin

    //route crud doctor admin
    Route::post('/doctor/add', [DoctorController::class, 'add']);
    Route::post('/doctor/edit', [DoctorController::class, 'edit']);
    Route::get('/doctor/delete/{id}', [DoctorController::class, 'delete']);

    //route crud consultation-payment admin
    Route::get('/consultation-payment/accept/{id}', [ConsultationPaymentController::class, 'accept']);
    Route::get('/consultation-payment/reject/{id}', [ConsultationPaymentController::class, 'reject']);



    //route crud reservation admin
    Route::get('/reservation/delete/{id}', [ReservationController::class, 'delete']);
    // end crud

    //route crud patient admin
    Route::post('/patient/add', [PatientController::class, 'patientAdd']);
});

Route::middleware(['session.user.doctor'])->prefix('doctor')->group(function () {

    Route::get('/', [DoctorViewController::class, 'index']);


    Route::get('/profile-index', [DoctorViewController::class, 'profileIndex']);
    Route::post('/profile/edit', [DoctorController::class, 'editProfile']);
    Route::post('/profile/edit-photo', [DoctorController::class, 'editPhotoProfile']);

    // route consultation doctor
    Route::get('/consultation-index', [DoctorViewController::class, 'consultationIndex']);
    Route::get('/consultation/detail-index/{id}', [DoctorViewController::class, 'consultationDetailIndex']);
    // end route consultation doctor

    // route reservation doctor
    Route::get('/reservation-index', [DoctorViewController::class, 'reservationIndex']);
    Route::get('/reservation/detail-index/{id}', [DoctorViewController::class, 'reservationDetailIndex']);
    // end route reservation doctor

    // route user doctor
    Route::get('/patient-index', [DoctorViewController::class, 'patientIndex']);
    Route::get('/patient/add-index', [DoctorViewController::class, 'patientAddIndex']);
    Route::get('/patient/detail-index/{id}', [DoctorViewController::class, 'patientDetailIndex']);
    // end route user doctor


    // route crud consultation doctor
    Route::post('/consultation/done', [ConsultationController::class, 'doneConsultation']);
    // end route crud consultation doctor
    // route crud reservation doctor
    Route::post('/reservation/done', [ReservationController::class, 'doneReservation']);
    // end route crud reservation doctor
});
