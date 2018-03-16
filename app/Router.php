<?php
/**
 * Created by PhpStorm.
 * User: SOul
 * Date: 3/16/2018
 * Time: 11:38 AM
 */

namespace App;

use App\Exceptions\MethodNotAllowedException;
use App\Exceptions\RouteNotFoundException;

class Router
{
    protected $path;
    protected $routes = [];
    protected $methods = [];

    public function setPath($path = '/') {
        $this->path = $path;
    }

    public function addRoute($uri, $handler, array $methods = ['GET']) {
        $this->routes[$uri] = $handler;
        $this->methods[$uri] = $methods;
    }

    public function getResponse() {

        if(!isset($this->methods[$this->path])) {
            throw  new RouteNotFoundException('No route registered for' .$this->path);
        }

        if(!in_array($_SERVER['REQUEST_METHOD'], $this->methods[$this->path])) {
            throw new MethodNotAllowedException;
        }

        return $this->routes[$this->path];
    }
}