<?php

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

Auth::routes();
/**--------------------------------------------------------------------Ativitadade-----------------------**/
Route::get('atividade/index', 'ActivitiesController@index');
Route::post('atividade/store', 'ActivitiesController@store');
Route::get('atividade/show/{id}', 'ActivitiesController@show');
Route::put('atividade/delete/{id}', 'ActivitiesController@destroy');
Route::get('atividada/edit/{id}', 'ActivitiesController@edit');
Route::put('atividade/update/{id}', 'ActivitiesController@update');
/**--------------------------------------------------------------------AtivitadadePPCs-----------------------**/
Route::get('atividadeppc/index', 'ActivityPCCsController@index');
Route::post('atividadeppc/store', 'ActivityPCCsController@store');
Route::get('atividadeppc/show/{id}', 'ActivityPCCsController@show');
Route::put('atividadepcc/delete/{id}', 'ActivityPCCsController@destroy');
Route::get('atividadapcc/edit/{id}', 'ActivityPCCsController@edit');
Route::put('atividadepcc/update/{id}', 'ActivityPCCsController@update');
/**--------------------------------------------------------------------Allocation-----------------------**/
Route::get('alocacao/index', 'AllocationsController@index');
Route::post('alocacao/store', 'AllocationsController@store');
Route::get('alocacao/show/{id}', 'AllocationsController@show');
Route::put('alocacao/delete/{id}', 'AllocationsController@destroy');
Route::get('alocacao/edit/{id}', 'AllocationsController@edit');
Route::put('alocacao/update/{id}', 'AllocationsController@update');
/**--------------------------------------------------------------------Ambiente-----------------------**/
Route::get('ambiente/index', 'AmbientsController@index');
Route::post('ambiente/store', 'AmbientsController@store');
Route::get('ambiente/show/{id}', 'AmbientsController@show');
Route::put('ambiente/delete/{id}', 'AmbientsController@destroy');
Route::get('ambiente/edit/{id}', 'AmbientsController@edit');
Route::put('ambiente/update/{id}', 'AmbientsController@update');
/**--------------------------------------------------------------------Nucleo-----------------------**/
Route::get('nucleo/index', 'CoresController@index');
Route::post('nucleo/store', 'CoresController@store');
Route::get('nucleo/show/{id}', 'CoresController@show');
Route::put('nucleo/delete/{id}', 'CoresController@destroy');
Route::get('nucleo/edit/{id}', 'CoresController@edit');
Route::put('nucleo/update/{id}', 'CoresController@update');
/**--------------------------------------------------------------------Modalidade-----------------------**/
Route::get('modalidade/index', 'ModalitiesController@index');
Route::post('modalidade/store', 'ModalitiesController@store');
Route::get('modalidade/show/{id}', 'ModalitiesController@show');
Route::put('modalidade/delete/{id}', 'ModalitiesController@destroy');
Route::get('modalidade/edit/{id}', 'ModalitiesController@edit');
Route::put('modalidade/update/{id}', 'ModalitiesController@update');
/**--------------------------------------------------------------------PPC-----------------------**/
Route::get('ppc/index', 'PPCsController@index');
Route::post('ppc/store', 'PPCsController@store');
Route::get('ppc/show/{id}', 'PPCsController@show');
Route::put('ppc/delete/{id}', 'PPCsController@destroy');
Route::get('ppc/edit/{id}', 'PPCsController@edit');
Route::put('ppc/update/{id}', 'PPCsController@update');
/**--------------------------------------------------------------------RDC-----------------------**/
Route::get('rdc/index', 'RDCsController@index');
Route::post('rdc/store', 'RDCsController@store');
Route::get('rdc/show/{id}', 'RDCsController@show');
Route::put('rdc/delete/{id}', 'RDCsController@destroy');
Route::get('rdc/edit/{id}', 'RDCsController@edit');
Route::put('rdc/update/{id}', 'RDCsController@update');
/**--------------------------------------------------------------------Tarefas-----------------------**/
Route::get('tarefa/index', 'TasksController@index');
Route::post('tarefa/store', 'TasksController@store');
Route::get('tarefa/show/{id}', 'TasksController@show');
Route::put('tarefa/delete/{id}', 'TasksController@destroy');
Route::get('tarefa/edit/{id}', 'TasksController@edit');
Route::put('tarefa/update/{id}', 'TasksController@update');
/**--------------------------------------------------------------------Tipo de Atividade----------------**/
Route::get('atividade/tipo/index', 'TypeActivitiesController@index');
Route::post('atividade/tipo/store', 'TypeActivitiesController@store');
Route::get('atividade/tipo/show/{id}', 'TypeActivitiesController@show');
Route::put('atividade/tipo/delete/{id}', 'TypeActivitiesController@destroy');
Route::get('atividade/tipo/edit/{id}', 'TypeActivitiesController@edit');
Route::put('atividade/tipo/update/{id}', 'TypeActivitiesController@update');
/**--------------------------------------------------------------------Tipo de User----------------**/
Route::get('usuario/tipo/index', 'TypeUsersController@index');
Route::post('usuario/tipo/store', 'TypeUsersController@store');
Route::get('usuario/tipo/show/{id}', 'TypeUsersController@show');
Route::put('usuario/tipo/delete/{id}', 'TypeUsersController@destroy');
Route::get('usuario/tipo/edit/{id}', 'TypeUsersController@edit');
Route::put('usuario/tipo/update/{id}', 'TypeUsersController@update');
/**--------------------------------------------------------------------User----------------**/
Route::get('usuario/index', 'UsersController@index');
Route::post('usuario/store', 'UsersController@store');
Route::get('usuario/show/{id}', 'UsersController@show');
Route::put('usuario/delete/{id}', 'UsersController@destroy');
Route::get('usuario/edit/{id}', 'UsersController@edit');
Route::put('usuario/update/{id}', 'UsersController@update');
/**--------------------------------------------------------------------User Tipo de User----------------**/
Route::get('usuario/tipo/usuario/index', 'UserTypeUsersController@index');
Route::post('usuario/tipo/usuario/store', 'UserTypeUsersController@store');
Route::get('usuario/tipo/usuario/show/{id}', 'UserTypeUsersController@show');
Route::put('usuario/tipo/usuario/delete/{id}', 'UserTypeUsersController@destroy');
Route::get('usuario/tipo/usuario/edit/{id}', 'UserTypeUsersController@edit');
Route::put('usuario/tipo/usuario/update/{id}', 'UserTypeUsersController@update');





Route::get('/home', 'HomeController@index')->name('home');

Route::get('token', function (){
    $http = new GuzzleHttp\Client;

    $response = $http->post('http://sciecserver.edu/oauth/token', [
        'form_params' => [
            'grant_type' => 'password',
            'client_id' => '3',
            'client_secret' => '0IlyToJd4XMD5CiU5qiHJBZMKW33FcsWhRTfVEWM',
            'username' => 'jonasjunior@ifto.edu.br',
            'password' => 'secret',
            'scope' => '',
        ],
    ]);

    return json_decode((string) $response->getBody(), true);

});




