<?php

use App\Models\Dtipo;
use App\Models\Cestado;
use App\Models\Funcionario;
use App\Models\Djtipo;
use App\Models\Obien;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\CestadoController;
use App\Http\Controllers\DtipoController;
use App\Http\Controllers\DdjjController;
use App\Http\Controllers\DjtipoController;
use App\Http\Controllers\UserController;
//use App\Http\Controllers\VencidasController;

use App\Http\Controllers\ObienController;
use App\Http\Controllers\PDFController;
use App\Models\User;

    Route::get('/', function(){
        return view ('panel.index');

    });

    //Route::resource('/cestados', 'CestadoController@index');

    //Route::resource('/funcionarios', FuncionarioController::class)->names('funcionario');    
    //Route::resource('/cestados', CestadoController::class)->names('cestado'); 
    //Route::resource('/dtipos', DtipoController::class)->names('dtipo');
    //Route::resource('/domicilioPart', DomicilioController::class)->names('domPart');
   

    //Agrupar las rutas por rol (Protegerlas)

                //Rutas del Agente

    Route::group(['middleware' => ['can:lista_funcionarios']], function () {
        Route::resource('/funcionarios', FuncionarioController::class)->names('funcionario');
    });

    Route::group(['middleware' => ['can:lista_ddjj']], function () {
        Route::resource('/ddjj', DdjjController::class)->names('ddjj');
    });

    /* Route::group(['middleware' => ['can:lista_vencidas']], function () {
        Route::resource('/vencidas', VencidasController::class)->names('vencidas');
    }); */

    /* Route::group(['middleware' => ['can:lista_ddjj']], function () {
        Route::resource('/vencidas', DdjjController::class)->names('vencidas');
        
    });
         */

                 //Rutas del Admin
   /*  Route::group(['middleware' => ['can:homeAdmin']], function () {
        Route::resource('/homeAdmin', HomeAdminController::class)->names('homeAdmin');
    });     */         

    Route::group(['middleware' => ['can:lista_cestados']], function () {
        Route::resource('/cestados', CestadoController::class)->names('cestado');
    });

    Route::group(['middleware' => ['can:lista_dtipos']], function () {
        Route::resource('/dtipos', DtipoController::class)->names('dtipo');
    }); 

    Route::group(['middleware' => ['can:lista_djtipos']], function () {
        Route::resource('/djtipos', DjtipoController::class)->names('djtipo');
    }); 

    Route::group(['middleware' => ['can:lista_usuarios']], function () {
        Route::resource('/usuarios', UserController::class)->names('usuario');
    });

                        //Rutas del Funcionario

    Route::group(['middleware' => ['can:carga_obienes']], function () {
        Route::resource('/cargabienes', DdjjController::class)->names('obienes');
    });
    
    Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('funcionario.pdf');
    //Route::get('publicacion-pdf', [PublicacionController::class, 'generatePDF'])->name('publicacion.pdf');


    /*
    //Apunte (marca error)
    Route::group(['middleware' => ['role:agente']], function () {
        Route::resource('/funcionarios', FuncionarioController::class)->names('funcionario');
    });
    */
        