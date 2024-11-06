<?php

namespace App\Commons;

use eftec\bladeone\BladeOne;
use Rakit\Validation\Validator;


class Controller
{
    protected $validator;

    public function __construct()
    {
        $this->validator = new Validator;
        $this->setMessageValidate();
    }

    public function renderView($view, $data, $type)
    {
        $tempPath = __DIR__ . "/../Views/{$type}";
        $cache = __DIR__ . "/../Views/Compiles";
        $blade = new BladeOne($tempPath, $cache);
        echo $blade->run($view, $data);
    }

    public function viewAdmin($view, $data = [])
    {
        return $this->renderView($view, $data, 'Admin');
    }

    public function viewClient($view, $data = [])
    {
        return $this->renderView($view, $data, 'Client');
    }

    public function setMessageValidate()
    {
        $this->validator->setMessages([
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật Khẩu',
            'phone' => 'Điện Thoại',
            'is_active' => 'Active',
            'role' => 'Quyền',
        ]);
    }
}
