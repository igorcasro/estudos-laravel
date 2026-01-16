<?php

use App\Http\Controllers\ClienteControlador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeuControlador;

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
    return view('welcome');
});

Route::get('/produtos', function () {
    return view('outras.produtos');
})->name('produtos');
Route::get('/departamentos', function () {
    return view('outras.departamentos');
})->name('departamentos');
Route::get('/nome', [MeuControlador::class, 'getNome']);
Route::get('/idade', [MeuControlador::class, 'getIdade']);
Route::get('/multiplicar/{n1}/{n2}', [MeuControlador::class, 'multiplicar']);


Route::resource('/clientes', ClienteControlador::class);

Route::get('/opcoes/{opcao?}', function ($opcao = null) {
    return view('outras.opcoes', compact(['opcao']));
})->name('opcoes');



Route::get('/bootstrap', function () {
    return view('outras.exemplo');
});
// Route::get('/ola/{nome}/{sobrenome}', function ($nome, $sobrenome) {
//     return "Olá! Seja bem vindo, $nome $sobrenome!";
// });

// Route::get('/seunome/{nome?}', function ($nome = null) {
//     if (isset($nome)) {
//         return "Ola. Seja bem vindo, $nome";
//     }
//     return "Nenhum nome inserido :/";
// });

// // Define uma rota e passa uma expressão regular para validar o nome
// Route::get('/rotacomregras/{nome}/{n}', function ($nome, $n) {
//     for ($i = 0; $i < $n; $i++) {
//         echo "Olá! Seja bem vindo, $nome!<br>";
//     }
// })->where('nome', '[A-Za-z]+')
//     ->where('n', '[0-9]+');

// // Agrupando rotas
// // Passando as rotas com view, é possível utilizar um arquivo da pasta resources / views

// // Para nomear rotas, usar ->name('')
// // Para usar rotas nomeadas, usar: href='{{ route('app.user') }}'
// Route::prefix('/app')->group(function () {
//     Route::get('/', function () {
//         return view('app');
//     })->name('app');

//     Route::get('/user', function () {
//         return view('user');
//     })->name('app.user');

//     Route::get('/profile', function () {
//         return view('profile');
//     })->name('app.profile');
// });

// // Redirecionamento de rotas
// Route::get('/produtos', function () {
//     echo "<h1>Produtos</h1>";
//     echo "<ol>";
//     echo "<li>Notebook</li>";
//     echo "<li>Impressora</li>";
//     echo "<li>Mouse</li>";
//     echo "<li>Teclado</li>";
//     echo "<li>Fone</li>";
//     echo "</ol>";
// })->name('meusprodutos');

// // Maneira 1
// // Redireciona todos os métodos que chegarem para a rota
// Route::redirect('todosprodutos1', 'produtos', 301);

// // Maneira 2
// Route::get('todosprodutos2', function () {
//     return redirect()->route('meusprodutos');
// });

// //////////////////////////////////////////////////////////////////////////////////
// // Para a rota funcionar sem autenticação csrf, é necessário incluir ela no arquivo /app/Http/Middleware/VerifyCsrfToken.php
// Route::post('/requisicoes', function (Request $request) {
//     return 'Hello POST';
// });

// Route::delete('/requisicoes', function (Request $request) {
//     return 'Hello DELETE';
// });

// Route::post('/requisicoes', function (Request $request) {
//     return 'Hello POST';
// });

// Route::patch('/requisicoes', function (Request $request) {
//     return 'Hello PATCH';
// });

// Route::options('/requisicoes', function (Request $request) {
//     return 'Hello OPTIONS';
// });

// Route::get('/requisicoes', function (Request $request) {
//     return 'Hello GET';
// });
// //////////////////////////////////////////////////////////////////////////////////
