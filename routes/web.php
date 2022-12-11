<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\ProblemaController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\SolicitacaoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

Route::get('/', function () {
    return view('principal');
})->name('index');

Auth::routes(['register' => false]);

Route::get('/contato', [App\Http\Controllers\HomeController::class, 'contato'])->name('contato');

Route::get('/status', [App\Http\Controllers\HomeController::class, 'status'])->name('status');

Route::get('/404', [\App\Http\Controllers\HomeController::class, 'erro404'])->name('404');

Route::post('/solicitacoes/status', [\App\Http\Controllers\StatusController::class, 'consultarStatus'])->name('solicitacoes.status');

//Rotas Fechadas
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('gerenteMiddleware')->name('home');

Route::get('/homeGeral', [\App\Http\Controllers\HomeController::class, 'homeGeral'])->name('homeGeral');


Route::get('/clientes', [\App\Http\Controllers\ClienteController::class, 'index'])->name('clientes.index');
Route::get('/problemas', [\App\Http\Controllers\ProblemaController::class, 'index'])->name('problemas.index');;
Route::get('/servicos', [\App\Http\Controllers\ServicoController::class, 'index'])->name('servicos.index');;
Route::get('/solicitacoes', [\App\Http\Controllers\SolicitacaoController::class, 'index'])->name('solicitacoes.index');
Route::get('/equipamentos', [\App\Http\Controllers\EquipamentoController::class, 'index'])->name('equipamentos.index');

Route::get('/funcionarios', [\App\Http\Controllers\UsuarioController::class, 'index'])->name('usuarios.index');;


Route::get('/gerarUsuarios', function () {
        if(DB::table('users')->count() == 0) {
            DB::table('users')->insert([
                [
                    'name' => 'Cauê',
                    'email' => 'caue@gmail.com',
                    'password' => Hash::make('caue1234'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Gabriela',
                    'email' => 'gabriela@gmail.com',
                    'password' => Hash::make('gabi1234'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);

            DB::table('gerentes')->insert([
                [
                    'id_gerente' => 1,
                ],
            ]);

            DB::table('funcionarios')->insert([
                [
                    'id_funcionario' => 2,
                    'cargo' => 'Manutenção de equipamentos',
                ],
            ]);
        } else {
            DB::table('users')->insert([
                [
                    'name' => 'Cauê',
                    'email' => 'caue@gmail.com',
                    'password' => Hash::make('caue1234'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Gabriela',
                    'email' => 'gabriela@gmail.com',
                    'password' => Hash::make('gabi1234'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);

            DB::table('gerentes')->insert([
                [
                    'id_gerente' => 12,
                ],
            ]);

            DB::table('funcionarios')->insert([
                [
                    'id_funcionario' => 13,
                    'cargo' => 'Manutenção de equipamentos',
                ],
            ]);
        }
    return redirect('/');
});
