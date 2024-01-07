<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\LatesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataController;

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

// Route::get('/', function () {
//     return view('login');
// })->name('login');

Route::post('/loginAuth', [UserController::class, 'loginAuth'])->name('loginAuth');
Route::get('/login', [UserController::class, 'index'])->name('login');


Route::get('/register', [UserController::class,'register'])->name('register');

Route::get('/error-permission', function(){
    return view('errors.permission');
})->name('error.permision');

Route::middleware(['IsLogin'])->group(function() {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/home', function (){
        return view('dashboard');
    })->name('home.page');
});

Route::middleware(['IsLogin', 'IsAdmin'])->group(function() {
    Route::prefix('/admin')->name('Admin.')->group(function () {

        Route::get('/', [HomeController::class,'dashboard'])->name('dashboard');

        Route::prefix('/user')->name('user.')->group(function () {
            Route::get('/', [UsersController::class, 'index'])->name('home');
            Route::post('/store', [UsersController::class, 'store'])->name('store');
            Route::get('/{id}', [UsersController::class, 'edit'])->name('edit');
            Route::post('/registerAuth', [UserController::class, 'registerAuth'])->name('registerAuth');

        
            Route::patch('/{id}', [UsersController::class, 'update'])->name('update');
            Route::delete('/{id}', [UsersController::class, 'destroy'])->name('destroy');
        });
        
        Route::prefix('/rombel')->name('rombel.')->group(function () {
            Route::get('/', [RombelController::class, 'index'])->name('home');
            Route::get('/create', [RombelController::class, 'create'])->name('create');
            Route::post('/store', [RombelController::class, 'store'])->name('store');
            Route::get('/{id}', [RombelController::class, 'edit'])->name('edit');
        
            Route::patch('/{id}', [RombelController::class, 'update'])->name('update');
            Route::delete('/{id}', [RombelController::class, 'destroy'])->name('destroy');
        });
        
        Route::prefix('/rayon')->name('rayon.')->group(function () {
            Route::get('/create', [RayonController::class, 'create'])->name('create');
            Route::post('/store', [RayonController::class, 'store'])->name('store');
            Route::get('/', [RayonController::class, 'index'])->name('index');
            Route::get('/{id}', [RayonController::class, 'edit'])->name('edit');
        
            Route::patch('/{id}', [RayonController::class, 'update'])->name('update');
            Route::delete('/{id}', [RayonController::class, 'destroy'])->name('destroy');

            // Route::get('/search', [RayonController::class,'search'])->name('search');
        });
        
        Route::prefix('/student')->name('student.')->group(function () {
            Route::get('/', [StudentsController::class, 'index'])->name('home');
            Route::get('/create', [StudentsController::class, 'create'])->name('create');
            Route::post('/store', [StudentsController::class, 'store'])->name('store');
            Route::get('/{id}', [StudentsController::class, 'edit'])->name('edit');
        
            Route::patch('/{id}', [StudentsController::class, 'update'])->name('update');
            Route::delete('/{id}', [StudentsController::class, 'destroy'])->name('destroy');
        });


        
        Route::prefix('/lates')->name('lates.')->group(function () {
            Route::get('/', [LatesController::class, 'index'])->name('home');
            Route::get('/show', [LatesController::class, 'show'])->name('show');
            Route::get('/create', [LatesController::class, 'create'])->name('create');
            Route::post('/store', [LatesController::class, 'store'])->name('store');
            Route::get('/{id}', [LatesController::class, 'edit'])->name('edit');
        
            Route::patch('/{id}', [LatesController::class, 'update'])->name('update');
            Route::delete('/{id}', [LatesController::class, 'destroy'])->name('destroy');
        });
        
        Route::prefix('/data')->name('data.')->group(function () {
            Route::get('/{id}', [DataController::class, 'index'])->name('home');
            Route::get('/download/{id}', [DataController::class, 'downloadPDF'])->name('download');
            Route::get('/downconto/{id}', [DataController::class, 'downloadconto'])->name('downloadconto');
            Route::get('/data', [DataController::class, 'data'])->name('data');
            // Route::get('/create', [LatesController::class, 'create'])->name('create');
            // Route::post('/store', [LatesController::class, 'store'])->name('store');
            // Route::get('/{id}', [LatesController::class, 'edit'])->name('edit');
        
            // Route::patch('/{id}', [LatesController::class, 'update'])->name('update');
            // Route::delete('/{id}', [LatesController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::middleware(['IsLogin', 'IsPs'])->group(function() {
    Route::prefix('/PembimbingSiswa')->name('PembimbingSiswa.')->group(function () {

        Route::get('/', [HomeController::class,'dashboard'])->name('dashboard');

        Route::prefix('/lates')->name('lates.')->group(function () {
            Route::get('/', [LatesController::class, 'index'])->name('home');
            Route::get('/show', [LatesController::class, 'show'])->name('show');
            Route::get('/create', [LatesController::class, 'create'])->name('create');
            Route::post('/store', [LatesController::class, 'store'])->name('store');
            Route::get('/{id}', [LatesController::class, 'edit'])->name('edit');
        
            Route::patch('/{id}', [LatesController::class, 'update'])->name('update');
            Route::delete('/{id}', [LatesController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('/student')->name('student.')->group(function () {
            Route::get('/', [StudentsController::class, 'index'])->name('home');
            Route::get('/create', [StudentsController::class, 'create'])->name('create');
            Route::post('/store', [StudentsController::class, 'store'])->name('store');
            Route::get('/{id}', [StudentsController::class, 'edit'])->name('edit');
        
            Route::patch('/{id}', [StudentsController::class, 'update'])->name('update');
            Route::delete('/{id}', [StudentsController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('/data')->name('data.')->group(function () {
            Route::get('/{id}', [DataController::class, 'index'])->name('home');
            Route::get('/download/{id}', [DataController::class, 'downloadPDF'])->name('download');
            Route::get('/downconto/{id}', [DataController::class, 'downloadconto'])->name('downloadconto');
            // Route::get('/create', [LatesController::class, 'create'])->name('create');
            // Route::post('/store', [LatesController::class, 'store'])->name('store');
            // Route::get('/{id}', [LatesController::class, 'edit'])->name('edit');
        
            // Route::patch('/{id}', [LatesController::class, 'update'])->name('update');
            // Route::delete('/{id}', [LatesController::class, 'destroy'])->name('destroy');
        });
        
    });
});


// Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function(){

    // Route::get('/', [HomeController::class,'dashboard'])->name('dashboard');

    // Route::prefix('/user')->name('user.')->group(function () {
    //     Route::get('/', [UsersController::class, 'index'])->name('home');
    //     Route::post('/store', [UsersController::class, 'store'])->name('store');
    //     Route::get('/{id}', [UsersController::class, 'edit'])->name('edit');
    
    //     Route::patch('/{id}', [UsersController::class, 'update'])->name('update');
    //     Route::delete('/{id}', [UsersController::class, 'destroy'])->name('destroy');
    // });
    
    // Route::prefix('/rombel')->name('rombel.')->group(function () {
    //     Route::get('/', [RombelController::class, 'index'])->name('home');
    //     Route::get('/create', [RombelController::class, 'create'])->name('create');
    //     Route::post('/store', [RombelController::class, 'store'])->name('store');
    //     Route::get('/{id}', [RombelController::class, 'edit'])->name('edit');
    
    //     Route::patch('/{id}', [RombelController::class, 'update'])->name('update');
    //     Route::delete('/{id}', [RombelController::class, 'destroy'])->name('destroy');
    // });
    
    // Route::prefix('/rayon')->name('rayon.')->group(function () {
    //     Route::get('/create', [RayonController::class, 'create'])->name('create');
    //     Route::post('/store', [RayonController::class, 'store'])->name('store');
    //     Route::get('/', [RayonController::class, 'index'])->name('index');
    //     Route::get('/{id}', [RayonController::class, 'edit'])->name('edit');
    
    //     Route::patch('/{id}', [RayonController::class, 'update'])->name('update');
    //     Route::delete('/{id}', [RayonController::class, 'destroy'])->name('destroy');

    //     // Route::get('/search', [RayonController::class,'search'])->name('search');
    // });
    
    // Route::prefix('/student')->name('student.')->group(function () {
    //     Route::get('/', [StudentsController::class, 'index'])->name('home');
    //     Route::get('/create', [StudentsController::class, 'create'])->name('create');
    //     Route::post('/store', [StudentsController::class, 'store'])->name('store');
    //     Route::get('/{id}', [StudentsController::class, 'edit'])->name('edit');
    
    //     Route::patch('/{id}', [StudentsController::class, 'update'])->name('update');
    //     Route::delete('/{id}', [StudentsController::class, 'destroy'])->name('destroy');
    // });
    
    // Route::prefix('/lates')->name('lates.')->group(function () {
    //     Route::get('/', [LatesController::class, 'index'])->name('home');
    //     Route::get('/create', [LatesController::class, 'create'])->name('create');
    //     Route::post('/store', [LatesController::class, 'store'])->name('store');
    //     Route::get('/{id}', [LatesController::class, 'edit'])->name('edit');
    
    //     Route::patch('/{id}', [LatesController::class, 'update'])->name('update');
    //     Route::delete('/{id}', [LatesController::class, 'destroy'])->name('destroy');
    // });

// });
