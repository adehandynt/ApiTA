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
    $router->get('/DetailDataProject/{id}', ['uses'=>'ProjectController@show']);
    $router->post('/InsertDataProject', ['uses'=>'ProjectController@create']);
    $router->delete('/DeleteDataProject/{id}', ['uses'=>'ProjectController@destroy']);
    $router->post('/UpdateDataProject/{id}', ['uses'=>'ProjectController@update']);

    //Bussiness Type
    $router->get('/DataBussinessType', ['uses'=>'BussinessTypeController@index']);
    $router->post('/InsertDataBussinessType', ['uses'=>'BussinessTypeController@create']);
    $router->get('/DetailDataBussinessType/{id}', ['uses'=>'BussinessTypeController@show']);
    $router->delete('/DeleteDataBussinessType/{id}', ['uses'=>'BussinessTypeController@destroy']);
    $router->post('/UpdateDataBussinessType/{id}', ['uses'=>'BussinessTypeController@update']);

     //Position
     $router->get('/DataPositon', ['uses'=>'PositionController@index']);
     $router->post('/InsertDataPositon', ['uses'=>'PositionController@create']);
     $router->get('/DetailDataPositon/{id}', ['uses'=>'PositionController@show']);
     $router->delete('/DeleteDataPositon/{id}', ['uses'=>'PositionController@destroy']);
     $router->post('/UpdateDataPositon/{id}', ['uses'=>'PositionController@update']);

      //Position Category
      $router->get('/DataPositonCategory', ['uses'=>'PositionCategoryController@index']);
      $router->post('/InsertDataPositonCategory', ['uses'=>'PositionCategoryController@create']);
      $router->get('/DetailDataPositonCategory/{id}', ['uses'=>'PositionCategoryController@show']);
      $router->delete('/DeleteDataPositonCategory/{id}', ['uses'=>'PositionCategoryController@destroy']);
      $router->post('/UpdateDataPositonCategory/{id}', ['uses'=>'PositionCategoryController@update']);

      //Country
      $router->get('/DataCountry', ['uses'=>'CountryController@index']);
      $router->post('/InsertDataCountry', ['uses'=>'CountryController@create']);
      $router->get('/DetailDataCountry/{id}', ['uses'=>'CountryController@show']);
      $router->delete('/DeleteDataCountry/{id}', ['uses'=>'CountryController@destroy']);
      $router->post('/UpdateDataCountry/{id}', ['uses'=>'CountryController@update']);

      //City
      $router->get('/DataCity', ['uses'=>'CityController@index']);
      $router->post('/InsertDataCity', ['uses'=>'CityController@create']);
      $router->get('/DetailDataCity/{id}', ['uses'=>'CityController@show']);
      $router->delete('/DeleteDataCity/{id}', ['uses'=>'CityController@destroy']);
      $router->post('/UpdateDataCity/{id}', ['uses'=>'CityController@update']);

      //BussinessPartner
      $router->get('/DataBussinessPartner', ['uses'=>'BussinessPartnerController@index']);
      $router->post('/InsertDataBussinessPartner', ['uses'=>'BussinessPartnerController@create']);
      $router->get('/DetailDataBussinessPartner/{id}', ['uses'=>'BussinessPartnerController@show']);
      $router->delete('/DeleteDataBussinessPartner/{id}', ['uses'=>'BussinessPartnerController@destroy']);
      $router->post('/UpdateDataBussinessPartner/{id}', ['uses'=>'BussinessPartnerController@update']);

      //Personil
      $router->get('/DataPersonil', ['uses'=>'PersonilController@index']);
      $router->post('/InsertDataPersonil', ['uses'=>'PersonilController@create']);
      $router->get('/DetailDataPersonil/{id}', ['uses'=>'PersonilController@show']);
      $router->delete('/DeleteDataPersonil/{id}', ['uses'=>'PersonilController@destroy']);
      $router->post('/UpdateDataPersonil/{id}', ['uses'=>'PersonilController@update']);



});


