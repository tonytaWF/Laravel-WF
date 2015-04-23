<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::bind('project', function($id)
{
    dd($id);
    return Project::where('id', $id)->first();
});

$router->get('/dashboard', [ 'as' => 'dashboard_path', 'uses' => 'HomeController@index' ]);


$router->resource('/', 'HomeController', [
	'only' => [
		'index', 'show'
	]
]);




// User Authentication
$router->get('/login', [
	'as' => 'login',
	'uses' => 'Auth\AuthController@getLogin'
]);

$router->post('/login', [
	'as' => 'post.login',
	'uses' => 'Auth\AuthController@postLogin'
]);

$router->get('/register', [
	'as' => 'register',
	'uses' => 'Auth\AuthController@getRegister'
]);

$router->post('/register', [
	'as' => 'post.register',
	'uses' => 'Auth\AuthController@postRegister'
]);

$router->get('/password/email', [
	'as' => 'password.email',
	'uses' => 'Auth\PasswordController@getEmail'
]);

$router->post('/password/email', [
	'as' => 'password.post.email',
	'uses' => 'Auth\PasswordController@postEmail'
]);

$router->get('/password/reset', [
	'as' => 'password.reset',
	'uses' => 'Auth\PasswordController@getReset'
]);

$router->post('/password/reset', [
	'as' => 'password.post.reset',
	'uses' => 'Auth\PasswordController@postReset'
]);


$router->get('/logout', [
	'as' => 'logout',
	'uses' => 'Auth\AuthController@getLogout'
]);

$router->get('/projects/manage', [
    'as' => 'projects.manage',
    'uses' => 'ProjectController@getManage'
]);

$router->get('/experiments', [
    'as' => 'experiments_path',
    'uses' => 'ExperimentController@index'
]);

$router->post('/experiments', [
    'as' => 'experiments_path',
    'uses' => 'ExperimentController@store'
]);


$router->post('/projects/edit-title', 'ProjectController@postEditTitle');
$router->post('/experiments/edit-title', 'ExperimentController@postEditTitle');

$router->post('/phase/uploads', 'PhaseController@postUpload');


Route::resource('projects', 'ProjectController');
Route::resource('projects/{projects}/experiments', 'ExperimentController');
Route::resource('admin', 'UserController');

Route::resource('leads', 'LeadsController');




//Route::resource('/', 'HomeController');
//Route::get('leads', 'LeadsController@index');
//Route::get('leads/create', 'LeadsController@create');
//Route::post('leads', 'LeadsController@store');



Route::get('home', 'HomeController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Event::listen('404', function() {
    return Response::error('404');
});


Event::listen('laravel.query', function($sql) {
   var_dump($sql);
});