<?php
use Illuminate\Routing\Router;

$router->get(trans('qreable::routes.my-qrs'), [
    'as' => 'qreable.myQrs',
    'uses' => 'PublicController@myQrs',
    'middleware' => 'logged.in'
]);
