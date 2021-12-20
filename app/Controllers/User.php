<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class User extends BaseController
{
    use ResponseTrait;

    protected $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $response = $this->user->find($username);

        if ($response !== null) {
            if (password_verify($password, $response['password'])) {
                return $this->respond(200);
            }
        }
        return $this->fail(400);
    }
}
