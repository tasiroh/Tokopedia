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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/admin/categorypost', 'CategorypostController@index');
$router->get('/admin/categorypost/{id}', 'CategorypostController@show');
$router->post('/admin/categorypost', 'CategorypostController@store');
$router->put('/admin/categorypost/{id}', 'CategorypostController@update');
$router->delete('/admin/categorypost/{id}', 'CategorypostController@delete');  

$router->get('/admin/pages', 'PagesController@index');
$router->post('/admin/pages', 'PagesController@store');
$router->get('/admin/page/{id}', 'PagesController@show');
$router->put('/admin/page/{id}', 'PagesController@update');
$router->delete('/admin/page/{id}', 'PagesController@destroy');

$router->get('/admin/users', 'UserController@index');
$router->post('/admin/users', 'UserController@store');
$router->get('/admin/user/{id}', 'UserController@show');
$router->put('/admin/user/{id}', 'UserController@update');
$router->delete('/admin/user/{id}', 'UserController@destroy');

$router->get('/admin/products', 'ProductController@index');
$router->post('/admin/products', 'ProductController@store');
$router->get('/admin/product/{id}', 'ProductController@show');
$router->put('/admin/product/{id}', 'ProductController@update');
$router->delete('/admin/product/{id}', 'ProductController@destroy');
$router->get('/admin/products', 'PublicProductController@index');
$router->get('/admin/product/{id}', 'PublicProductController@show');



$router->get('/admin/comments', 'CommentController@index');
$router->post('/admin/comments', 'CommentController@store');
$router->get('/admin/comment/{id}', 'CommentController@show');
$router->put('/admin/comment/{id}', 'CommentController@update');
$router->delete('/admin/comment/{id}', 'CommentController@destroy');
$router->get('/admin/product/{id}', 'ProductCommentController@show');
$router->post('/admin/product/{id}/review', 'ProductCommentController@store');


$router->get('/admin/categories', 'CategoriesController@index');
$router->post('/admin/categories', 'CategoriesController@store');
$router->get('/admin/categories/{id}', 'CategoriesController@show');
$router->put('/admin/categories/{id}', 'CategoriesController@update');
$router->delete('/admin/categories/{id}', 'CategoriesController@destroy');