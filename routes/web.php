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
    $app->get('posts/index', 'PostsController@index');
    
    $app->post('posts/add', 'PostsController@createPost');
    
    $app->get('posts/view/{id}', 'PostsController@showPost');
    
    $app->put('posts/edit/{id}', 'PostsController@updatePost');
    
    $app->delete('posts/delete/{id}', 'PostsController@deletePost');
    
});