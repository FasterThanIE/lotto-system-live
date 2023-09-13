<?php

use App\Http\Controllers\CreditCardsController;
use App\Http\Controllers\CreditsController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\User\ProfileController;
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

Route::view("/", "pages.home");

Route::middleware("auth")->group(function() {

    Route::view("/loto", "pages.loto")->name("loto.index");

    // prefixiranje: /profile
    Route::controller(ProfileController::class)->prefix("/profile")->group(function (){
        Route::view("/", "pages.profile");
        Route::view("/add-credits", "pages.add_credits")->name("profile.add_credits");
        Route::post("/save", "save")->name("profile.save");
    });

    Route::controller(CreditsController::class)->prefix("/credits")->group(function () {
        Route::post("/add", "add")->name("credits.add");
    });


    Route::controller(CreditCardsController::class)->prefix("/credit-cards")->group(function() {
        Route::post("/save", "save")->name("cards.save");
        Route::get("/delete/{card}", "delete")->name("cards.delete"); // credit-cards/delete/5
    });


    Route::controller(TicketsController::class)->prefix("loto")->group(function() {
        Route::post("/buy", "buy")->name("loto.buy");
    });


});


Auth::routes();
