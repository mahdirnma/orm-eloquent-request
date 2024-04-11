<?php

use App\Models\Tour;
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
    $tours=Tour::all();
    return $tours;
});
Route::get('/tours', function () {
    $tours=Tour::all();

    return view("tours",[
        "tours"=>$tours
    ]);
});
Route::get('/where', function () {
    $tours=Tour::where("title","Like","%h%")->get();
    return $tours;
});
Route::get('/find', function () {
    $tours=Tour::find(1);
    return $tours;
});
Route::get('/tour/create', function () {
    return view("create_tour");
});
/*Route::post('/tour/add', function () {
//    $all=request()->all();
    $title=request("title");
    $description=request("description");
//    $title="mytitle";
//    $description="mydescription";

    $tour=new Tour();
    $tour->title=$title;
    $tour->description=$description;
    $tour->save();

    return $tour;
});*/

Route::post('/tour/add', function () {
    $title=request("title");
    $description=request("description");
    $tour=Tour::create([
        "title"=>$title,
        "description"=>$description
    ]);
    return redirect("/tours");
});

