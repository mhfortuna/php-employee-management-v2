<?php

class UserController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel("user");
    }

    /** THE FOLLOWING METHODS ARE INTENDED TO RENDER A VIEW */
    function dashboard()
    {
        $this->view->render("user/dashboard");
    }

    /** THE FOLLOWING METHODS WILL BE CALLED THROUGH AJAX */
    function addUser()
    {
        $user = json_decode(file_get_contents("php://input"), true);
        $newUser = $this->model->addUser($user);
        echo json_encode($newUser);
    }

    function getUsers()
    {
        echo json_encode($this->model->getUsers());
    }

    function deleteUser($id)
    {
        $this->model->deleteUser($id);
    }

    function updateUser()
    {
        $user = json_decode(file_get_contents("php://input"), true);
        if (!isset($user['id'])) {
            $this->throw_error(401, "Bad Request");
        }
        $newUser = $this->model->updateUser($user);
        echo json_encode($newUser);
    }
}
