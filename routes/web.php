<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AutherController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


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

Route::get('/', function () {
    return view('welcome',['title'=> "Welcome"]);
})->middleware('guest');
Route::get('/login', function () {
    return view('login',['title'=> "login"]);
})->middleware('guest');
Route::get('/register', [RegisterController::class, 'index']
)->middleware('guest');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/Change-password', [LoginController::class, 'changePassword'])->name('change_password');


Route::middleware('auth')->group(function () {
   Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboardAdmin', [dashboardController::class, 'indexAdmin'])->name('dashboardAdmin');
    Route::get('/disallow',function(){
        return view('disallow');
    });
    Route::get('/borrow',[BorrowController::class,'index'])->name('borrow');
    Route::get('/borrowAdmin',[BorrowController::class,'indexAdmin'])->name('borrowAdmin');
    Route::post('/borrow/edit/{borrow}', [BorrowController::class, 'edit'])->name('borrow.edit');
    Route::post('/borrow/update/{id}', [BorrowController::class, 'update'])->name('borrow.update');
    Route::post('/borrow/delete/{id}', [BorrowController::class, 'destroy'])->name('borrow.destroy');
    Route::post('/borrow/acc/{id}', [BorrowController::class, 'acc'])->name('borrow.acc');
    
    //user route
    Route::post('/user/update/{id}',[UserController::class,'update'])->name('user.update');
    Route::get('/user/changeimage',[UserController::class,'changeImage'])->name('user.change');
    
    //For storing an image
    Route::post('/user/storeImage/{id}',[UserController::class,'storeImage'])->name('user.store');

    // author CRUD
    Route::get('/authors', [AutherController::class, 'index'])->name('authors');
    Route::get('/authorsAdmin', [AutherController::class, 'indexAdmin'])->name('authorsAdmin');
    Route::get('/authors/create', [AutherController::class, 'create'])->name('authors.create');
    Route::get('/authors/edit/{auther}', [AutherController::class, 'edit'])->name('authors.edit');
    Route::post('/authors/update/{id}', [AutherController::class, 'update'])->name('authors.update');
    Route::post('/authors/delete/{id}', [AutherController::class, 'destroy'])->name('authors.destroy');
    Route::post('/authors/create', [AutherController::class, 'store'])->name('authors.store');

    // publisher crud
    Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers');
    Route::get('/publishersAdmin', [PublisherController::class, 'indexAdmin'])->name('publishersAdmin');

    Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create');
    Route::get('/publisher/edit/{publisher}', [PublisherController::class, 'edit'])->name('publisher.edit');
    Route::post('/publisher/update/{id}', [PublisherController::class, 'update'])->name('publisher.update');
    Route::post('/publisher/delete/{id}', [PublisherController::class, 'destroy'])->name('publisher.destroy');
    Route::post('/publisher/create', [PublisherController::class, 'store'])->name('publisher.store');

 
    Route::get('/status',[StatusController::class,'index'])->name('status');
    Route::get('/statusAdmin',[StatusController::class,'index'])->name('statusAdmin');
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::get('/profileAdmin',[ProfileController::class,'index'])->name('profileAdmin');
    
    // books CRUD
    Route::get('/books', [BookController::class, 'index'])->name('books');
    Route::get('/booksAdmin', [BookController::class, 'indexAdmin'])->name('booksAdmin');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::post('/book/update/{id}', [BookController::class, 'update'])->name('book.update');
    Route::post('/book/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::post('/book/order/{id}', [BookController::class, 'order'])->name('book.order');
    Route::post('/book/create', [BookController::class, 'store'])->name('book.store');
});
