<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});


$app->group(['prefix' => 'api/v1'], function($app)
{
   
    
    $app->group(['prefix' => 'posts', 'middleware' => 'auth'], function($app)
    {
        $app->get('index', 'PostsController@index');
    
        $app->post('add', 'PostsController@createPost');
        
        $app->get('view/{id}', 'PostsController@showPost');
        
        $app->put('edit/{id}', 'PostsController@updatePost');
        
        $app->delete('delete/{id}', 'PostsController@deletePost');
    
    });
    
    
    $app->group(['prefix' => 'users'], function($app)
    {
        $app->post('add', 'UserController@add');
        
        $app->get('view/{id}', 'UserController@viewPost');
        
        $app->put('edit/{id}', 'UserController@editPost');
        
        $app->get('index', 'UserController@index');
        
         $app->delete('delete/{id}', 'UserController@deletePost');
        
    });
    
});

