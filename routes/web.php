<?php



use App\Http\Controllers\DasboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use Illuminate\Support\Facades\Route;
use App\Exports\PemasukanExport;
use App\Exports\PengeluaranExport;
use App\Http\Controllers\AuthController;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get("/login", [AuthController::class,"login"])->name("login");
Route::post("/login", [AuthController::class,"log"])->name("log");

Route::get("/logout", [AuthController::class,"logout"])->name("logout");

Route::get("/dasboard", [DasboardController::class,'view'] ) ->name('dasboard') ->middleware('auth');

Route::get("/pemasukan", [PemasukanController::class,'view'] ) ->name('pemasukan')->middleware('auth');
Route::get("/pemasukan-add", [PemasukanController::class,'create'] ) ->name('pemasukan-add')->middleware('auth');
Route::post("/pemasukan", [PemasukanController::class,'add'] )->middleware('auth');
Route::get("/pemasukan-edit/{id}", [PemasukanController::class,'edit'] ) ->name('pemasukan-edit')->middleware(['auth','must-admin']);
Route::put("/pemasukan/{id}", [PemasukanController::class,'update'] )->middleware(['auth','must-admin']);
// Route::get("/pemasukan-delete/{id}", [PemasukanController::class,'delete'] )->name('pemasukan-delete')->middleware(['auth','must-admin']);
Route::get("/pemasukan-destroy/{id}", [PemasukanController::class,'destroy'] )->middleware(['auth','must-admin']);

Route::get("/pengeluaran", [PengeluaranController::class,'view'] ) ->name('pengeluaran')->middleware('auth');
Route::get("/pengeluaran-add", [PengeluaranController::class,'create'] ) ->name('pengeluaran-add')->middleware('auth');
Route::post("/pengeluaran", [PengeluaranController::class,'add'] )->middleware('auth');
Route::get("/pengeluaran-edit/{id}", [PengeluaranController::class,'edit'] ) ->name('pengeluaran-edit')->middleware(['auth','must-admin']);
Route::put("/pengeluaran/{id}", [PengeluaranController::class,'update'] )->middleware(['auth','must-admin']);
// Route::get("/pengeluaran-delete/{id}", [PengeluaranController::class,'delete'] )->name('pengeluaran-delete')->middleware(['auth','must-admin']);
Route::get("/pengeluaran-destroy/{id}", [PengeluaranController::class,'destroy'] )->middleware(['auth','must-admin']);

Route::get('/history', [HistoryController::class, 'index'])->name('history')->middleware('auth');

Route::get('export-pemasukan', function () {
    return Excel::download(new PemasukanExport, 'pemasukan.xlsx');
});

Route::get('export-pengeluaran', function () {
    return Excel::download(new PengeluaranExport, 'pengeluaran.xlsx');
});


Route::get('/', function () {
    return view('home',['halaman' => 'home']);
})->name('home');



// Route::get('/welcome', function () {
//     return view('welcome',['halaman' => 'home']);
// })->name('welcome');

// Route::get('/login', function () {
//     return view('login',['halaman' => 'login']);
// })->name('login');

