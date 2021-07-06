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

$router->group(['prefix' => 'api'], function () use ($router) {

    //Project
    $router->get('/GetDataProject', ['uses' => 'ProjectController@index']);
    $router->get('/DataProjectByid/{id}', ['uses' => 'ProjectController@show']);
    $router->post('/InsertDataProject', ['uses' => 'ProjectController@create']);
    $router->delete('/DeleteDataProject/{id}', ['uses' => 'ProjectController@destroy']);
    $router->post('/UpdateDataProject/{id}', ['uses' => 'ProjectController@update']);
    $router->post('/UpdateDataProjectSetDefault/{id}', ['uses' => 'ProjectController@updateSetDefault']);
    $router->get('/GetDataProjectSetDefault', ['uses' => 'ProjectController@GetProjectsetDefault']);
    $router->get('/getLastProjectID', ['uses' => 'ProjectController@getLastProjectID']);

    //Bussiness Type
    $router->get('/DataBussinessType', ['uses' => 'BussinessTypeController@index']);
    $router->post('/InsertDataBussinessType', ['uses' => 'BussinessTypeController@create']);
    $router->get('/DataBussinessTypeByid/{id}', ['uses' => 'BussinessTypeController@show']);
    $router->delete('/DeleteDataBussinessType/{id}', ['uses' => 'BussinessTypeController@destroy']);
    $router->post('/UpdateDataBussinessType/{id}', ['uses' => 'BussinessTypeController@update']);
    $router->get('/DataBussinessTypeby/{type}', ['uses' => 'BussinessTypeController@bytype']);

    //Country
    $router->get('/DataCountry', ['uses' => 'CountryController@index']);
    $router->post('/InsertDataCountry', ['uses' => 'CountryController@create']);
    $router->get('/DataCountryByid/{id}', ['uses' => 'CountryController@show']);
    $router->get('/DataLastInput', ['uses' => 'CountryController@showLastInput']);
    $router->delete('/DeleteDataCountry/{id}', ['uses' => 'CountryController@destroy']);
    $router->post('/UpdateCountry/{id}', ['uses' => 'CountryController@update']);

    //Position
    $router->get('/DataPosition', ['uses' => 'PositionController@index']);
    $router->post('/InsertDataPosition', ['uses' => 'PositionController@create']);
    $router->get('/DataPositionByid/{id}', ['uses' => 'PositionController@show']);
    $router->delete('/DeleteDataPosition/{id}', ['uses' => 'PositionController@destroy']);
    $router->post('/UpdatePosition/{id}', ['uses' => 'PositionController@update']);
    $router->get('/DataPositionbyPersonil/{PersonilID}', ['uses' => 'PositionController@PositionbyPersonil']);


    //Position Category
    $router->get('/DataPositionCategory', ['uses' => 'PositionCategoryController@index']);
    $router->post('/InsertDataPositionCategory', ['uses' => 'PositionCategoryController@create']);
    $router->get('/DataPositionCategoryByid/{id}', ['uses' => 'PositionCategoryController@show']);
    $router->delete('/DeleteDataPositionCategory/{id}', ['uses' => 'PositionCategoryController@destroy']);
    $router->post('/UpdatePositionCategory/{id}', ['uses' => 'PositionCategoryController@update']);

    //City
    $router->get('/DataCity', ['uses' => 'CityController@index']);
    $router->post('/InsertDataCity', ['uses' => 'CityController@create']);
    $router->get('/DataCityByid/{id}', ['uses' => 'CityController@show']);
    $router->get('/DataCityByCountryId/{id}', ['uses' => 'CityController@DataCityByCountryId']);
    $router->delete('/DeleteDataCity/{id}', ['uses' => 'CityController@destroy']);
    $router->post('/UpdateCity/{id}', ['uses' => 'CityController@update']);

    //BussinessPartner
    $router->get('/DataBusinessPartner', ['uses' => 'BussinessPartnerController@index']);
    $router->post('/InsertDataBusinessPartner', ['uses' => 'BussinessPartnerController@create']);
    $router->get('/DataBusinessPartnerByid/{id}', ['uses' => 'BussinessPartnerController@show']);
    $router->delete('/DeleteDataBusinessPartner/{id}', ['uses' => 'BussinessPartnerController@destroy']);
    $router->post('/UpdateDataBusinessPartner/{id}', ['uses' => 'BussinessPartnerController@update']);
    $router->get('/DataBusinessPartnerByType/{type}', ['uses' => 'BussinessPartnerController@Partnerbytype']);


    //Personil
    $router->get('/DataPersonil', ['uses' => 'PersonilController@index']);
    $router->post('/InsertDataPersonil', ['uses' => 'PersonilController@create']);
    $router->get('/DataPersonilByid/{id}', ['uses' => 'PersonilController@show']);
    $router->delete('/DeleteDataPersonil/{id}', ['uses' => 'PersonilController@destroy']);
    $router->post('/UpdateDataPersonil/{id}', ['uses' => 'PersonilController@update']);
    $router->get('/DataPersonilbyPosition/{PositionID}', ['uses' => 'PersonilController@PersonilbyPosition']);
    $router->get('/DataPersonilbyPartner/{BussinessPartnerID}', ['uses' => 'PersonilController@PersonilbyPartner']);

    //currency
    $router->get('/DataCurrency', ['uses' => 'CurrencyController@index']);
    $router->post('/InsertDataCurrency', ['uses' => 'CurrencyController@create']);
    $router->get('/DataCurrencyByid/{id}', ['uses' => 'CurrencyController@show']);
    $router->delete('/DeleteDataCurrency/{id}', ['uses' => 'CurrencyController@destroy']);
    $router->post('/UpdateCurrency/{id}', ['uses' => 'CurrencyController@update']);

    //unit
    $router->get('/DataUnit', ['uses' => 'UnitController@index']);
    $router->post('/InsertDataUnit', ['uses' => 'UnitController@create']);
    $router->get('/DataUnitByid/{id}', ['uses' => 'UnitController@show']);
    $router->delete('/DeleteDataUnit/{id}', ['uses' => 'UnitController@destroy']);
    $router->post('/UpdateUnit/{id}', ['uses' => 'UnitController@update']);

    //weather
    $router->get('/DataWeather', ['uses' => 'WeatherController@index']);
    $router->post('/InsertDataWeather', ['uses' => 'WeatherController@create']);
    $router->get('/DataWeatherByid/{id}', ['uses' => 'WeatherController@show']);
    $router->delete('/DeleteDataWeather/{id}', ['uses' => 'WeatherController@destroy']);
    $router->post('/UpdateWeather/{id}', ['uses' => 'WeatherController@update']);

    //PrivilegedName
    $router->get('/DataPrivilegedName', ['uses' => 'PrivilegedNameController@index']);
    $router->post('/InsertDataPrivilegedName', ['uses' => 'PrivilegedNameController@create']);
    $router->get('/DataPrivilegedNameByid/{id}', ['uses' => 'PrivilegedNameController@show']);
    $router->delete('/DeleteDataPrivilegedName/{id}', ['uses' => 'PrivilegedNameController@destroy']);
    $router->post('/UpdatePrivilegedName/{id}', ['uses' => 'PrivilegedNameController@update']);

    //Privileged
    $router->get('/DataPrivileged', ['uses' => 'UserPrivilegedController@index']);
    $router->post('/InsertDataPrivileged', ['uses' => 'UserPrivilegedController@create']);
    $router->get('/DataPrivilegedByid/{id}', ['uses' => 'UserPrivilegedController@show']);
    $router->get('/DataSpecPrivilegedByid/{id}', ['uses' => 'UserPrivilegedController@SpecPrivilegedByid']);
    $router->delete('/DeleteDataPrivileged/{id}', ['uses' => 'UserPrivilegedController@destroy']);
    $router->post('/UpdatePrivileged/{id}', ['uses' => 'UserPrivilegedController@update']);

     //user
     $router->get('/DataUser', ['uses' => 'UserController@index']);
     $router->post('/InsertDataUser', ['uses' => 'UserController@create']);
     $router->get('/DataUserByid/{id}', ['uses' => 'UserController@show']);
     $router->get('/DataUserPrivilegedByid/{id}', ['uses' => 'UserController@UserPrivilegedByid']);
     $router->delete('/DeleteDataUser/{id}', ['uses' => 'UserController@destroy']);
     $router->post('/UpdateUser/{id}', ['uses' => 'UserController@update']);
    //Project Number
    $router->get('/DataProjectNumber', ['uses' => 'ProjectNumberController@index']);
    $router->post('/InsertProjectNumber', ['uses' => 'ProjectNumberController@create']);

    //Contractor Equipment 
    $router->get('/DataContractorEquipment', ['uses' => 'ContractorEquipmentController@index']);
    $router->post('/InsertContractorEquipment', ['uses' => 'ContractorEquipmentController@create']);
    $router->delete('/DeleteContractorEquipment/{id}', ['uses' => 'ContractorEquipmentController@destroy']);
    $router->post('/UpdateContractorEquipment/{id}', ['uses' => 'ContractorEquipmentController@update']);
    $router->get('/DataContractorEquipmentByid/{id}', ['uses' => 'ContractorEquipmentController@show']);


    //Risk Management
    $router->get('/DataRiskManagement', ['uses' => 'RiskManagementController@index']);
    $router->post('/InsertRiskManagement', ['uses' => 'RiskManagementController@create']);
    $router->delete('/DeleteRiskManagement/{id}', ['uses' => 'RiskManagementController@destroy']);
    $router->post('/UpdateRiskManagement/{id}', ['uses' => 'RiskManagementController@update']);
    $router->get('/DataRiskManagementByid/{id}', ['uses' => 'RiskManagementController@show']);

    //BaselineBOQ
    $router->get('/DataBoq', ['uses' => 'BaselineBoqController@index']);
    $router->post('/InsertDataBoq', ['uses' => 'BaselineBoqController@create']);
    $router->get('/DataBoqByid/{id}', ['uses' => 'BaselineBoqController@show']);
    $router->delete('/DeleteBoq/{id}', ['uses' => 'BaselineBoqController@destroy']);
    $router->post('/UpdateBoq/{id}', ['uses' => 'BaselineBoqController@update']);
    $router->get('/DataBoqchild/{id}', ['uses' => 'BaselineBoqController@DataBoqchild']);
    $router->get('/getAllBoq', ['uses' => 'BaselineBoqController@getAllBoq']);

    $router->get('/DataBoqHistory', ['uses' => 'HistoryBoqController@index']);
    $router->post('/InsertDataBoqHistory', ['uses' => 'HistoryBoqController@create']);
    $router->get('/DataBoqByidHistory/{ProjectID}/{contractorID}/{created_at}/{time_at}', ['uses' => 'HistoryBoqController@DataBoqByidHistory']);
    $router->delete('/DeleteBoqHistory/{id}', ['uses' => 'HistoryBoqController@destroy']);
    $router->post('/UpdateBoqHistory/{id}', ['uses' => 'HistoryBoqController@update']);
    $router->get('/DataBoqchildHistory/{id}', ['uses' => 'HistoryBoqController@DataBoqchildHistory']);

    $router->get('/DataDocument', ['uses' => 'DocumentsController@index']);
    $router->post('/InsertDataDocument', ['uses' => 'DocumentsController@create']);
    $router->get('/DataDocumentByid/{id}', ['uses' => 'DocumentsController@show']);
    $router->delete('/DeleteDataDocument/{id}', ['uses' => 'DocumentsController@destroy']);
    $router->post('/UpdateDataDocument/{id}', ['uses' => 'DocumentsController@update']);

    $router->get('/DataActualWbs', ['uses' => 'ActualWbsController@index']);
    $router->post('/InsertDataActualWbs', ['uses' => 'ActualWbsController@create']);
    $router->get('/DataActualWbsByid/{id}', ['uses' => 'ActualWbsController@show']);
    $router->delete('/DeleteDataActualWbs/{id}', ['uses' => 'ActualWbsController@destroy']);
    $router->post('/UpdateDataActualWbs{id}', ['uses' => 'ActualWbsController@update']);
    $router->get('/DataActualWbschild/{id}', ['uses' => 'ActualWbsController@DataDataActualWbschild']);
    $router->get('/getAllDataActualWbs', ['uses' => 'ActualWbsController@getAllDataActualWbs']);
    //MobilizationDate
    $router->get('/DataMobilizationDate', ['uses' => 'MobilizationDateController@index']);
    $router->post('/InsertMobilizationDate', ['uses' => 'MobilizationDateController@create']);
    $router->get('/DataMobilizationDateByBusinessPartner/{BusinessPartner}', ['uses' => 'MobilizationDateController@byBusinessPartner']);

});
