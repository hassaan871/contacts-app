<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthSession;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\CheckPermission;

Route::get('/', function () {
    return view('login');
});

// Basic Auth Views
Route::get('/signup', function () {
    session()->forget('user');
    return view('signup');
});
Route::get('/login', function () {
    session()->forget('user');
    return view('login');
});
Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/login');
});

// Basic Auth Controllers 
Route::post('/signup', [AuthController::class, 'Signup']);
Route::post('/login', [AuthController::class, 'Login']);

// Routes that require Authentication 
Route::middleware([AuthSession::class])->group(function () {

    // Home view 
    Route::get('/home', function () {
        return view('home');
    });
    
    // Contacts view 
    Route::get('/contacts', [ContactController::class, 'contactsList'])->middleware([CheckPermission::class . ':read_contact']);

    // Contacts CRUD
    Route::post('/contacts', [ContactController::class, 'createNewContact'])->middleware([CheckPermission::class . ':create_contact']);
    Route::delete('/contacts/{id}', [ContactController::class, 'deleteContact'])->middleware([CheckPermission::class . ':delete_contact']);

    // Showing the edit contact form 
    Route::get('/contacts/{id}', [ContactController::class, 'editContactForm'])->middleware([CheckPermission::class . ':read_contact']);
    Route::put('/contacts/{id}', [ContactController::class, 'editContact'])->middleware([CheckPermission::class . ':update_contact']);
    
    // Search bar
    Route::get('/search', [ContactController::class, 'search'])->middleware([CheckPermission::class . ':read_contact']);

    // Admin Routes 
    Route::middleware([IsAdmin::class])->group(function () {
        Route::get('/users', [UserController::class, 'getUsers']);
        Route::put('/permission', [UserController::class, 'updateContactsPermission']);
        Route::post('/users', [UserController::class, 'create']);
        Route::delete('/users/{id}', [UserController::class, 'deleteUser']);
        Route::get('/users/{id}', [UserController::class, 'editUserForm']);
        Route::put('/users/{id}', [UserController::class, 'editUser']);
    });
});