<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SolicitacaoController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

# Página de Autenticação e Controlo de Sessões
Route::redirect('/', 'login');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('verify', [SessionsController::class, 'auth'])->middleware('guest');
Route::get('logout', [SessionsController::class, 'destroy'])->middleware('auth');


# Utilizador geral
Route::get('dashboard', [DashboardController::class, 'show'])->middleware('auth');
    # Consultar definições
Route::get('definicoes', [DashboardController::class, 'definicoes'])->middleware('auth');
    # Alterar dados pessoais
Route::post('/definicoes/changeName', [DashboardController::class, 'changeName'])->middleware('auth');
Route::post('/definicoes/changeEmail', [DashboardController::class, 'changeEmail'])->middleware('auth');
Route::post('/definicoes/changePassword', [DashboardController::class, 'changePassword'])->middleware('auth');


# Solicitações
    # Registar nova solicitação
Route::get('/solicitacao/novo', [SolicitacaoController::class, 'showForm'])->middleware('auth');
Route::post('/solicitacao/guardar', [SolicitacaoController::class, 'storeForm'])->middleware('auth');
    # Consultar solicitação
Route::get('/solicitacao/{solicitacao:solicitacao_id}', [SolicitacaoController::class, 'consultar'])->middleware('auth');
    # Editar solicitação
Route::get('/solicitacao/editar/{solicitacao:solicitacao_id}', [SolicitacaoController::class, 'showEditForm'])->middleware('auth')->name('editar');
Route::post('/solicitacao/editar/', [SolicitacaoController::class, 'confirmEditForm'])->middleware('auth');
    # Consultar arquivo
Route::get('arquivo', [DashboardController::class, 'arquivo'])->middleware('auth');


# Administração
Route::get('/admin', [AdminController::class, 'admin_dashboard']);#->middleware('auth');

Route::get('/admin/register', [AdminController::class, 'register']);#->middleware('auth');
Route::post('/admin/register', [AdminController::class, 'store']);#->middleware('auth');