<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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

Route::resource('produtos', ProdutoController::class);
Route::get('/', [SiteController::class, 'index'])->name('site.index');

/*
Route::get('/', function () {
    return redirect()->route('admin.clientes');
});

 Route::group([
    'prefix' => 'admin',
    'as' => 'admin'
], function(){

    Route::get('dashboard', function(){
        return "dashboard";
    })->name('dashboard');
    
    Route::get('users', function(){
        return "users";
    })->name('users');;
    
    Route::get('clientes', function(){
        return "clientes";
    })->name('clientes');;
});
*/

/*

Route::any('/any', function(){
    return "Permite todo o tipo de acesso http (put, delete, get, post)";
});

Route::match(['get', 'post'], '/match', function(){
    return "Permite apenas acessos definidos";
});

Route::get('/produto/{id}/{cat}', function($id, $cat){
    return "O id do produto é: ".$id."<br>"."A categoria é: ".$cat;
;});

Route::view('/empresa', 'site/empresa');

Route::get('/news', function(){
    return view('news');
})->name('noticias');

Route::get('/novidades', function(){
    return redirect()->route('noticias');
});
*/

/* 
    Route ::get('/sobre', function(){
    return redirect('/empresa');
}); 

mesma coisa que:
*/

// Route::redirect('/sobre', '/empresa');