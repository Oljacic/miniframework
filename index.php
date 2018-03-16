<?php

require 'vendor\autoload.php';

use App\Controllers\HomeController;

$app = new App\App;

$container = $app->getContainer();

$container['errorHandler'] = function() {
   return function ($response) {
       return $response->setBody('Page not found')->withStatus(404);
   };
};

$container['config'] = function () {
    return [
        'db_driver' => 'mysql',
        'db_host' => 'localhost',
        'db_name' => 'project2',
        'db_user' => 'root',
        'db_pass' => '',
    ];
};

$container['db'] = function ($c) {
  return new PDO(
      $c->config['db_driver'].':host='.$c->config['db_host'].';dbname='.$c->config['db_name'],
      $c->config['db_user'],
      $c->config['db_pass']
  );
};

$app->get('/', [new HomeController, 'index']);
$app->get('/users', [new \App\Controllers\UserController($container->db), 'index']);

$app->run();