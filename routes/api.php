<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->post('login', 'App\Http\Controllers\Api\Auth\LoginController@login');
    $api->post('register', 'App\Http\Controllers\Api\Auth\RegisterController@register');
    $api->post('customer/create', 'App\Http\Controllers\Api\CustomerController@store');
    $api->post('project/create', 'App\Http\Controllers\Api\ProjectController@store');
    $api->post('contact/create', 'App\Http\Controllers\Api\ContactController@store');
    $api->post('service/create', 'App\Http\Controllers\Api\ServiceController@store');
    $api->post('campaign/create', 'App\Http\Controllers\Api\CampaignController@store');
    $api->post('campaign/state', 'App\Http\Controllers\Api\CampaignController@state');

    $api->group(['middleware' => 'api.auth'], function ($api) {

        $api->group(['middleware' => 'role:admin'], function($api) {
            $api->get('user', 'App\Http\Controllers\Api\Auth\UserController@index');
            $api->get('customer', 'App\Http\Controllers\Api\CustomerController@index');
            $api->get('project', 'App\Http\Controllers\Api\ProjectController@index');
            $api->get('contact', 'App\Http\Controllers\Api\ContactController@index');
            $api->get('service', 'App\Http\Controllers\Api\ServiceController@index');
            $api->get('campaign', 'App\Http\Controllers\Api\CampaignController@index');
        });
    });
});