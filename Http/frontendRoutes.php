<?php

$router->get(trans('qreable::routes.myQrs'), [
    'as' => 'qreable.myQrs',
    'uses' => 'PublicController@myQrs',
    'middleware' => 'logged.in',
]);
