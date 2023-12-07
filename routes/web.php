<?php

use App\Models\Status;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\processController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\canceledController;
use App\Http\Controllers\completedController;
use App\Http\Controllers\dashboardController;

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

// Route::get('/', function () {
//     return view('pages.homeeng');
// });

Route::get('/', function () {
    app()->setLocale('en');
    return view('pages.homeeng');
});

Route::get('/en', function () {
    app()->setLocale('en');
    return view('pages.homeeng');
});

// Rute untuk halaman beranda dalam bahasa Indonesia
Route::get('/id', function () {
    app()->setLocale('id');
    return view('pages.homeid');
});

Route::get('/abouteng', function () {
    return view('pages.abouteng');
})->name('about.en');

Route::get('/aboutind', function () {
    return view('pages.aboutind');
})->name('about.in');

// ... your existing routes

Route::get('/about/{lang}', [ContactController::class, 'sendEmail'])->name('about');


// Route::resource('/admin', dashboardController::class)->middleware('auth');
Route::resource('/admin', dashboardController::class)->except(['create', 'edit'])->middleware('auth');
Route::get('/admin', [dashboardController::class, 'index'])->name('admin.index')->middleware('auth');
Route::resource('/request', RequestController::class)->except(['create', 'edit'])->middleware('auth');
Route::resource('/process', processController::class)->except(['create', 'edit'])->middleware('auth');
Route::resource('/completed', completedController::class)->except(['create', 'edit'])->middleware('auth');
Route::resource('/canceled', canceledController::class)->except(['create', 'edit'])->middleware('auth');

// ====================================================================
// update data
// Admin
Route::post('/booking/update/{id}',function(Request $request,$id){
    Booking::find($id)->update([
        'status_id'=>$request->status
    ]);
    return redirect()->back()->with('success','Data updated successfully.');
})->name('update.booking');

Route::get('/booking/edit/{id}',function($id){
    $data=Booking::where('id',$id)->with('status')->first();
    if(!$data){
        return response()->json("Data not found",404);
    }
    return response()->json($data);
})->name('edit.booking');

// pengajuan
Route::post('/request/update/{id}',function(Request $request,$id){
    Booking::find($id)->update([
        'status_id'=>$request->status
    ]);
    return redirect()->back()->with('success','Data updated successfully.');
})->name('update.request');

Route::get('/request/edit/{id}',function($id){
    $data=Booking::where('id',$id)->with('status')->first();
    if(!$data){
        return response()->json("Data not found",404);
    }
    return response()->json($data);
})->name('edit.request');

// completed
Route::post('/completed/update/{id}',function(Request $request,$id){
    Booking::find($id)->update([
        'status_id'=>$request->status
    ]);
    return redirect()->back()->with('success','Data updated successfully.');
})->name('update.completed');

Route::get('/completed/edit/{id}',function($id){
    $data=Booking::where('id',$id)->with('status')->first();
    if(!$data){
        return response()->json("Data not found",404);
    }
    return response()->json($data);
})->name('edit.completed');

// canceled
Route::post('/canceled/update/{id}',function(Request $request,$id){
    Booking::find($id)->update([
        'status_id'=>$request->status
    ]);
    return redirect()->back()->with('success','Data updated successfully.');
})->name('update.canceled');

Route::get('/canceled/edit/{id}',function($id){
    $data=Booking::where('id',$id)->with('status')->first();
    if(!$data){
        return response()->json("Data not found",404);
    }
    return response()->json($data);
})->name('edit.canceled');


// =============================================================================

Route::get('/generate-pdf', [PdfController::class, 'generatePdf'])->name('generate-pdf');

Route::get('/login', function () {
    return view('pages.dashboard.login');
});

Route::get('/register', function () {
    return view('pages.dashboard.register');
});

Route::get('/id', function () {
    return view('pages.homeid');
});

Route::post('/{lang}/booking', 'App\Http\Controllers\FormPemesananController@store')->name('kirim');

Route::post ('/about/mail/send-mail',[ContactController::class,'maildata'])->name('send_mail');

// ==========================================


require __DIR__.'/auth.php';
