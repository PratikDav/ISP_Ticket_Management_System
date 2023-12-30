<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;


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
Route::get('/', [AuthController::class, 'login']);
Route::post('user/login', [AuthController::class, 'userLogin']);
Route::get('register/form', [AuthController::class, 'registerForm']);

Route::middleware(['IsLoggedIn'])->group(function(){

/************************
Admin Section Start
 **************************/

Route::get('/home', [AdminController::class,'viewHomePage']);
Route::get('admin/form', [UserController::class,'viewAdminForm']);
Route::post('admin/store', [UserController::class,'storeAdmin']);
Route::get('admin/show', [UserController::class,'showAdmin']);
Route::get('admin/edit/{id}', [UserController::class,'editAdmin']);
Route::post('admin/update', [UserController::class,'updateAdmin']);
Route::get('admin/delete/{id}', [UserController::class,'deleteAdmin']);


Route::get('admin/pending-users', [UserController::class, 'pendingUsers'])->name('pendingUser');
Route::get('admin/approve-users/{userId}', [UserController::class, 'approveUsers']);
Route::get('admin/pending-users/delete/{userId}', [UserController::class, 'pendingUserDelete']);

Route::get('admin/control_access', [AdminController::class, 'ControlAccess']);

Route::get('admin/pending-ticket', [TicketController::class, 'pendingTicketAdmin']);
Route::get('admin/ticket/ticket-history', [TicketController::class, 'ticketHistoryAdmin']);
Route::get('ticket/accept/{id}', [TicketController::class, 'acceptTicket']);
Route::get('ticket/make-pending/{id}', [TicketController::class, 'makePendingTicket']);


Route::get('admin/messaging', [MessageController::class, 'showMessageSection']);
Route::post('admin/sent-message-to-client', [MessageController::class, 'sendMessageToClient']);


Route::get('category/create-category', [CategoryController::class,'showCategory'])->name('show.Category');
Route::post('category/post-category', [CategoryController::class, 'addCategory']);
Route::get('category/delete/{id}', [CategoryController::class, 'deleteCategory']);


Route::get('/features', [FeaturesController::class,'showFeatures'])->name('show.Feature');
Route::post('features/add-features', [FeaturesController::class, 'addFeatures']);
Route::get('feature/delete/{id}', [FeaturesController::class, 'deleteFeature']);

/******Admin Support******/
Route::get('admin/supports', [SupportController::class, 'adminSupport']);
/************************
Admin Section End
 **************************/





/************************
Client Section Start
 **************************/


/******Client Controlling******/
Route::get('client/form', [UserController::class, 'viewClientForm']);
Route::post('client/store', [UserController::class, 'storeClient']);
Route::get('client/show', [UserController::class, 'showClient']);
Route::get('client/edit/{id}', [UserController::class, 'editClient']);
Route::post('client/update/{id}', [UserController::class, 'updateClient']);
Route::get('client/delete/{id}', [UserController::class, 'deleteClient']);

/******Client Messaging******/
Route::get('client/messaging', [MessageController::class, 'showMessageSectionClient']);

/******Client Ticket******/
Route::get('ticket/create-ticket', [TicketController::class, 'showCreateTicketPage']);
Route::get('ticket/ticket-history', [TicketController::class, 'showTicketHistoryPage']);
Route::post('ticket/post-ticket', [TicketController::class, 'createTicket']);

/******Client Support******/
Route::get('client/supports', [UserController::class, 'clientSupport']);

/************************
Client Section End
 **************************/

Route::get('user/profile', [UserController::class, 'showUserProfile']);
Route::post('user-profile/update-basic-information', [UserController::class, 'updateBasicInfo']);
Route::post('user-profile/update-client-information', [UserController::class, 'updateClientInfo']);
Route::post('user-profile/update-password', [UserController::class, 'updatePassword']);

Route::get('logout', [AuthController::class, 'logout']);


});
