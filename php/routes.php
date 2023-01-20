<?php

class Routes
{
    // Todo: implement middlewares and routes per request method
    const ROUTES = [
        '/' => [
            'controllerClass' => 'IndexController',
            'method' => 'index',
        ],
        '/validate' => [
            'controllerClass' => 'validateController',
            'method' => 'index',
        ],
        '/submit' => [
            'controllerClass' => 'submitController',
            'method' => 'submit',
        ],
    ];
}