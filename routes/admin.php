<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [LoginController::class,'create']);
Route::post('/admin/login-store', [LoginController::class,'store']);
Route::post('/admin/logout', [LoginController::class,'destroy']);
Route::get('/admin/register', function(){
return view('admin.pages.register');
});

Route::get('/admin/forget-password', [PasswordResetLinkController::class,'create']);


Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AuthController::class,'index']);


    Route::get('/admin/create-category', [CategoryController::class, 'create']);
    Route::post('/admin/store-category', [CategoryController::class, 'store']);
    Route::get('/admin/getAllCategories', [CategoryController::class, 'getAllCategories']);
    Route::get('/admin/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::post('/admin/update-category/{id}', [CategoryController::class, 'update']);
    Route::get('/admin/delete-category/{id}', [CategoryController::class, 'delete']);

    //subcategories
    Route::get('/admin/create-subCategory', [SubCategoryController::class, 'create']);
    Route::post('/admin/store-subCategory', [SubCategoryController::class, 'store']);
    Route::get('/admin/getAllSubCategories', [SubCategoryController::class, 'getAllSubCategories']);
    Route::get('/admin/edit-subCategory/{id}', [SubCategoryController::class, 'edit']);
    Route::post('/admin/update-subCategory/{id}', [SubCategoryController::class, 'update']);
    Route::get('/admin/delete-subCategory/{id}', [SubCategoryController::class, 'delete']);

    //product
    Route::get('get-subcategories/{category_id}', [ProductController::class, 'getSubcategories']);
    Route::get('/admin/create-product', [ProductController::class, 'create']);
    Route::post('/admin/store-product', [ProductController::class, 'store']);
    Route::get('/admin/getAllProducts', [ProductController::class, 'getAllProducts']);
    Route::get('/admin/edit-product/{id}', [productController::class, 'edit']);
    Route::post('/admin/update-product/{id}', [productController::class, 'update']);
    Route::get('/admin/delete-product/{id}', [productController::class, 'delete']);

    //roles
    Route::get('/admin/create-role', [RolesController::class, 'create']);
    Route::post('/admin/store-role', [RolesController::class, 'store']);
    Route::get('/admin/roles', [RolesController::class, 'index']);
    Route::get('/admin/edit-role/{id}', [RolesController::class, 'edit']);
    Route::put('/admin/update-role/{id}', [RolesController::class, 'update']);
    Route::delete('/admin/delete-role/{id}', [RolesController::class, 'destroy']);
    //users
    Route::get('/admin/create-user', [UsersController::class, 'create']);
    Route::post('/admin/store-user', [UsersController::class, 'store']);
    Route::get('/admin/users', [UsersController::class, 'index']);
    Route::get('/admin/edit-user/{id}', [UsersController::class, 'edit']);
    Route::put('/admin/update-user/{id}', [UsersController::class, 'update']);
    Route::delete('/admin/delete-user/{id}', [UsersController::class, 'destroy']);

    //transaction
    Route::get('/admin/getAllTransactions', [TransactionController::class, 'getAllTransactions']);
    
});