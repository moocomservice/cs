<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\DB;
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

Route::view('/', 'welcome');

Route::post('/profile', [AuthController::class, 'loginSubmit']);

Route::get('/moreinfo', function () {
    return view('moreinfo');
})->name('moreinfo');

Route::get('/newreport', function () {
    return view('newreport');
})->name('newreport');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');

Route::get('/reportlist', [ReportController::class, 'reportList'])
    ->middleware(['auth', CheckRole::class])
    ->name('reportlist');

Route::patch('/report/{id}', [ReportController::class, 'update'])->name('report.update');

Route::post('/search', function (Request $request) {
    $phone = $request->input('phone');
    $name = $request->input('name');
    $id = $request->input('id');
    $bank = $request->input('bank');
    $accountNumber = $request->input('account_number');

    // Perform search in the database
    $query = DB::table('blacklists')
        ->where(function($query) use ($phone, $name, $id, $bank, $accountNumber) {
            if ($phone) {
                $query->orWhere('telephone', $phone);
            }
            if ($name) {
                $query->orWhere('name', $name);
            }
            if ($id) {
                $query->orWhere('idcard', $id);
            }
            if ($bank) {
                $query->orWhere('bankType', $bank);
            }
            if ($accountNumber) {
                $query->orWhere('bankAccount', $accountNumber);
            }
        });

    $report = $query->first();

    if ($report) {
        $found = true;
        $name = $report->name;
        $amount = $report->amount;
        $product = $report->productName;
        $date = $report->date;
        $number = $report->id;
        $imageUrls = json_decode($report->image_urls);

        return view('results', compact('name', 'amount', 'product', 'date', 'number', 'found', 'imageUrls'));
    } else {
        $found = false;
        return view('results', compact('name', 'found'));
    }
});
