<?php

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

Route::get('/', function () {
    return view('welcome');    
})->name('home');

Route::get('/user/{id}', function ($id) {
    return $id;    
})->name('user.profile');

Route::get('/post/{slug}', function ($slug) {
    return $slug;    
})->name('blog.post');

Route::get('/category/{category}', function ($category) {
    $noticias=[
    ['titulo'=>"Carros",'categoria'=>'montadoras'],['titulo'=>"Motos", 'categoria'=>'modelos']
    ];
    $resultado=[];
    foreach($noticias as $noticia){
        if ($noticia['categoria']==$category){
            $resultado[]=$noticia;
        }
    }

    return $resultado;    
})->name('blog.category');

Route::get('/user/{id}/language/{lang?}', function ($id,$lang="portugues") {
    return "usuario com id $id a linguagem $lang";   
})->name('user.profile.language');


Route::get('/products/{category}/{minPrice?}', function ($category,$minPrice=10) {
    $produtos=[
        ['titulo'=>"eletronico",'categoria'=>'componenteeletronico', "preco"=>100],['titulo'=>"celular", 'categoria'=>'s23', "preco"=>200]
        ];
        $resultado=[];
        foreach($produtos as $produto){
            if ($produto['categoria']==$category && $produto['preco']<=$minPrice){
                $resultado[]=$produto;
            }
        }
      
    return $resultado;    
})->name('products.category.price');


Route::get('/page/{page}', function ($page) {
    return $page;  
})->where('page', '[0-9]+')
->name('page.number');


Route::get('/convert/{currency}', function ($currency) {
    $result = ($currency/4.93);
   return $result;    
})->where('currency', '[0-9]+') 
->name('currency.converter');



Route::get('/soma/{number1}/{number2}', function ($number1,$number2) {
    $result = $number1+$number2;
    return "A soma de $number1 e $number2 é igual a $result";    
})->name('sum.numbers');


Route::get('/subtracao/{number1}/{number2}', function ($number1,$number2) {
    $result = $number1-$number2;
    return "A subtração de $number1 e $number2 é igual a $result";    
})->name('subtract.numbers');