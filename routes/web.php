<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/register/trabalhar', 'Trabalhador\TrabalhadorController@register')->name('trabalhador.register');
Route::post('/register/trabalhar/save', 'Trabalhador\TrabalhadorController@store')->name('trabalhador.store');

Route::get('/register/contratar', 'Cliente\ClienteController@register')->name('cliente.register');
Route::post('/register/contratar/save', 'Cliente\ClienteController@store')->name('cliente.store');

Route::get('/', 'Padrao\HomeController@index')->name('home');
Route::get('/home', 'Padrao\HomeController@index')->name('home_search');

Auth::routes();

Route::middleware("auth")->group(function (){
    
    Route::get('/logout', 'Padrao\HomeController@logout')->name('logout');
    
    
    Route::middleware("isAdmin")->group(function (){
        Route::get("/administrador", 'Admin\AdminController@create')->name('admin');
        Route::post("/administrador/save", 'Admin\AdminController@store')->name('cadastrar_categoria');
    });
    
    Route::middleware("isTrabalhador")->group(function(){
        
        Route::get('/trabalhador/meu-perfil','Trabalhador\TrabalhadorController@perfil_privado')->name('trabalhador_perfil_privado');
        
        Route::get('/trabalhador/portfolio/cadastrar','Trabalhador\PortfolioController@create')->name('cadastrar_portfolio');
        Route::post('/trabalhador/portfolio/cadastrar/save','Trabalhador\PortfolioController@store')->name('salvar_portfolio');
        
        Route::get('/trabalhador/trabalho/cadastrar','Trabalhador\TrabalhosController@create')->name('cadastrar_trabalho');
        Route::post('/trabalhador/trabalho/cadastrar/save','Trabalhador\TrabalhosController@store')->name('salvar_trabalho');
        
        Route::get('/trabalhador/{id}/aceitar','Trabalhador\TrabalhadorController@aceitar_proposta')->name('aceitar_proposta');
        Route::get('/trabalhador/{id}/recusar','Trabalhador\TrabalhadorController@recusar_proposta')->name('recusar_proposta');
    });
    
    Route::get('/trabalhador/portfolio/{id}','Trabalhador\PortfolioController@show')->name('show_portfolio');
    
    Route::post('/trabalho/proposta', 'Cliente\ClienteController@efetuar_proposta')->name('cliente_proposta');
    Route::get('/proposta/{id}', 'Trabalhador\TrabalhosController@proposta')->name('ver_proposta');

    Route::get('/trabalho/{id}', 'Trabalhador\TrabalhosController@show')->name('trabalho_show');
    
    Route::middleware("isCliente")->group(function(){
        Route::get('/cliente/meu-perfil','Cliente\ClienteController@perfil_privado')->name('cliente_perfil_privado');
    });
});