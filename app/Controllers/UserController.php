<?php
/**
 * Created by PhpStorm.
 * User: SOul
 * Date: 3/16/2018
 * Time: 2:07 PM
 */

namespace App\Controllers;


use App\Models\User;
use PDO;

class UserController
{
    protected $db;

    function __construct(PDO $db) {
        $this->db = $db;
    }

    public function index($response) {
        $users = $this->db->query("SELECT *FROM users")->fetchAll(PDO::FETCH_CLASS, User::class);

        return $response->withJson($users);
    }
}