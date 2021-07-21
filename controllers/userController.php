<?php
// require_once('loginManager.php');

// if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['pwd'])) {
//      $username = $_POST["email"];
//      $password = $_POST["pwd"];
//      login($username, $password);
// }

// if (isset($_GET['logOut'])) {
//      session_destroy();
//      header('Location: ../../index.php?logOut=true');
// }


class UserController extends Controller
{
     // function __construct() we shouldn't need this, it's inherited
     // {
     // }
     // public function render() {
     //      $this->
     // }
     public function defaultMethod()
     {
          $this->view->render('login');
     }

     public function loginUser()
     {
          $login = $this->model->login();
          if ($login) {
               $this->view->render('dashboard');
          } else {
               $this->view->messageType = "error";
               $this->view->message = "Wrong email or password";
               $this->view->render('login');
          }
     }

     public function logoutUser() {
          // $login = $this->model->logout();
          $this->view->messageType = "success";
          $this->view->message = "Logout successfully";
          $this->view->render('login');
     }
}
