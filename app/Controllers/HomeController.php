<?php

/**
 * Created by PhpStorm.
 * User: SOul
 * Date: 3/16/2018
 * Time: 1:03 PM
 */

namespace  App\Controllers;

class HomeController
{
    public function index($response) {
        return $response->setBody('Home');
    }
}