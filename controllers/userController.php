<?php
class UserController extends Controller
{
     public function defaultMethod()
     {
          $this->loginUser();
     }

     public function loginUser()
     {
          if (!empty($_POST)) {
               $login = $this->model->login();
               if ($login) {
                    header('Location: ' . BASE_URL . 'employee');
               } else {
                    $this->view->messageType = "error";
                    $this->view->message = "Wrong email or password";
                    $this->view->render('login');
               }
          } else {
               $this->view->render('login');
          }
     }

     public function logoutUser()
     {
          if (empty($_POST)) {
               $this->view->messageType = "success";
               $this->view->message = "Logout successfully";
               $this->view->render('login');
          } else {
               $this->loginUser();
          }
     }
}
