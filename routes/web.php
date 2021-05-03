<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group( ['prefix'=> 'api'] ,function() use ($router){

    //Project
    $router->get('/DataProject', ['uses'=>'ProjectController@index']);
    $router->get('/DataProject/{id}', ['uses'=>'ProjectController@show']);
    $router->post('/DataProject', ['uses'=>'ProjectController@create']);
    $router->delete('/DataProject/{id}', ['uses'=>'ProjectController@destroy']);
    $router->put('/DataProject/{id}', ['uses'=>'ProjectController@update']);

    //Bussiness Type
    $router->get('/DataBussinessType', ['uses'=>'BussinessTypeController@index']);
    $router->post('/DataBussinessType', ['uses'=>'BussinessTypeController@create']);
    $router->get('/DataBussinessType/{id}', ['uses'=>'BussinessTypeController@show']);
    $router->delete('/DataBussinessType/{id}', ['uses'=>'BussinessTypeController@destroy']);
    $router->put('/DataBussinessType/{id}', ['uses'=>'BussinessTypeController@update']);

     //Position
     $router->get('/DataPositon', ['uses'=>'PositionController@index']);
     $router->post('/DataPositon', ['uses'=>'PositionController@create']);
     $router->get('/DataPositon/{id}', ['uses'=>'PositionController@show']);
     $router->delete('/DataPositon/{id}', ['uses'=>'PositionController@destroy']);
     $router->put('/DataPositon/{id}', ['uses'=>'PositionController@update']);

      //Position Category
      $router->get('/DataPositonCategory', ['uses'=>'PositionCategoryController@index']);
      $router->post('/DataPositonCategory', ['uses'=>'PositionCategoryController@create']);
      $router->get('/DataPositonCategory/{id}', ['uses'=>'PositionCategoryController@show']);
      $router->delete('/DataPositonCategory/{id}', ['uses'=>'PositionCategoryController@destroy']);
      $router->put('/DataPositonCategory/{id}', ['uses'=>'PositionCategoryController@update']);

      //Country
      $router->get('/DataCountry', ['uses'=>'CountryController@index']);
      $router->post('/DataCountry', ['uses'=>'CountryController@create']);
      $router->get('/DataCountry/{id}', ['uses'=>'CountryController@show']);
      $router->delete('/DataCountry/{id}', ['uses'=>'CountryController@destroy']);
      $router->put('/DataCountry/{id}', ['uses'=>'CountryController@update']);

      //City
      $router->get('/DataCity', ['uses'=>'CityController@index']);
      $router->post('/DataCity', ['uses'=>'CityController@create']);
      $router->get('/DataCity/{id}', ['uses'=>'CityController@show']);
      $router->delete('/DataCity/{id}', ['uses'=>'CityController@destroy']);
      $router->put('/DataCity/{id}', ['uses'=>'CityController@update']);

      //BussinessPartner
      $router->get('/DataBussinessPartner', ['uses'=>'BussinessPartnerController@index']);
      $router->post('/DataBussinessPartner', ['uses'=>'BussinessPartnerController@create']);
      $router->get('/DataBussinessPartner/{id}', ['uses'=>'BussinessPartnerController@show']);
      $router->delete('/DataBussinessPartner/{id}', ['uses'=>'BussinessPartnerController@destroy']);
      $router->put('/DataBussinessPartner/{id}', ['uses'=>'BussinessPartnerController@update']);

      //Personil
      $router->get('/DataPersonil', ['uses'=>'PersonilController@index']);
      $router->post('/DataPersonil', ['uses'=>'PersonilController@create']);
      $router->get('/DataPersonil/{id}', ['uses'=>'PersonilController@show']);
      $router->delete('/DataPersonil/{id}', ['uses'=>'PersonilController@destroy']);
      $router->put('/DataPersonil/{id}', ['uses'=>'PersonilController@update']);



});


