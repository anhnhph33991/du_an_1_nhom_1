<?php

namespace App\Controllers\Admin;

use App\Commons\Controller;
use App\Interfaces\CRUDInterfaces;
use App\Models\User;
use Rakit\Validation\Validator;


class UserController extends Controller implements CRUDInterfaces
{
    private const PATH_VIEW = 'users.';
    protected User $user;

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->getAll();

        return $this->viewAdmin(self::PATH_VIEW . __FUNCTION__, [
            'users' => $users
        ]);
    }
    public function create()
    {
        return $this->viewAdmin(self::PATH_VIEW . __FUNCTION__);
    }
    public function store()
    {
        $validation = $this->validator->make($_POST + $_FILES, [
            'name'                  => 'required',
            'email'                 => 'required|email',
            'password'              => 'required',
            'phone'              => 'required|numeric',
            'is_active'              => 'nullable|in:0,1',
            'role'              => 'nullable|in:0,1',
        ]);


        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['old-data'] = $_POST;
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            toastr('error', 'Create new user failed');

            return header('location: ' . routeAdmin('users/create'));
        } else {
            $this->user->insert([
                'name'                      => $_POST['name'],
                'email'                     => $_POST['email'],
                'password'                  => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'phone'                     => $_POST['phone'],
                'is_active'                 => $_POST['is_active'] ??= 0,
                'role'                      => $_POST['role'],
            ]);
            toastr('success', 'Create new user successfully');
            return header('location: ' . routeAdmin('users'));
        }
    }
    public function show(string $id)
    {
        return $this->viewAdmin(self::PATH_VIEW . __FUNCTION__);
    }
    public function edit(string $id)
    {
        return $this->viewAdmin(self::PATH_VIEW . __FUNCTION__, [
            'user' => $this->user->find($id)
        ]);
    }
    public function update(string $id)
    {
        
        $validation = $this->validator->make($_POST + $_FILES, [
            'name'                  => 'required',
            'email'                 => 'required|email',
            'password'              => 'required',
            'phone'              => 'required|numeric',
            'is_active'              => 'nullable|in:0,1',
            'role'              => 'nullable|in:0,1',
        ]);

        // then validate
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['old-data'] = $_POST;
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            toastr('error', 'Create new user failed');

            return header('location: ' . routeAdmin('users/create'));
        } else {
            $this->user->insert([
                'name'                      => $_POST['name'],
                'email'                     => $_POST['email'],
                'password'                  => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'phone'                     => $_POST['phone'],
                'is_active'                 => $_POST['is_active'] ??= 0,
                'role'                      => $_POST['role'],
            ]);
            toastr('success', 'Create new user successfully');
            return header('location: ' . routeAdmin('users'));
        }
    }
    public function destroy(string $id)
    {
        $user = $this->user->find($id);

        if ($user) {
            $this->user->delete($id);
            toastr('success', 'Delete user success');
            return header('location: ' . routeAdmin('users'));
        }
    }
}
