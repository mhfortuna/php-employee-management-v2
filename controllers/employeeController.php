<?php
// require("./employeeManager.php");
// $method = $_SERVER['REQUEST_METHOD'];
// $path = "../../resources/employees.json";


// switch ($method) {
//   case "POST":
//     if(!isset($_GET['update'])){
//       $newEmployee = $_POST;
//       $result = addEmployee($newEmployee);
//       break;
//     }
//     if($_GET["update"] == true && isset($_SESSION['employeeUpdate'])){
//       updateEmployee($_SESSION['employeeUpdate'],$_POST);
//       break;
//     }
//     if($_GET["update"] == true && !isset($_SESSION['employeeUpdate'])){
//       $newEmployee = $_POST;
//       $result = addEmployee($newEmployee);
//       $_SESSION['newEmployee'] = $result;
//       header("Location: ../employee.php?okUpdate=true");
//       break;
//     }
//     break;

//   case 'GET':
//     if($_GET["ID"]){
//       $idEmployee = $_GET['ID'];
//       getEmployee($idEmployee);
//     }
//     break;

//   case "DELETE":
//     parse_str(file_get_contents("php://input"), $_DELETE);
//     $employeeID = $_DELETE['id'];
//     $result = deleteEmployee($employeeID);
//     break;
// }

// header("Content-Type: application/json");
// echo json_encode($result);
class EmployeeController extends Controller
{
  public function __call($method, $arguments)
  {
    // Method called when no method matches the one passed
    return false;
  }

  public function defaultMethod()
  {
    $this->getContent();
  }
  function getContent()
  {
    $contents = $this->model->get();
    $this->view->contents = $contents; // This data will be used in the view
    $this->view->render('dashboard');
  }

  function createEmployee()
  {
    if (!empty($_POST)) {
      //Goes to create model function insert
      $result = $this->model->insert($_POST);
      if ($result) {
        header('Location: ./employee');
      } else {
        $message = $result;
        $messageType = 'error';
        $this->view->message = $message;
        $this->view->messageType = $messageType;
      }
    }
    $this->view->render('employee');
    // $this->render("create");
  }

  function getByIdEmployee($id)
  {
    // if (empty($_POST)) {
    $result = $this->model->getById($id[0]);
    if (is_array($result)) {
      $this->view->employee = $result;
    } else {
      $message =  $result;
      $messageType = 'error';
      $this->view->message = $message;
      $this->view->messageType = $messageType;
    }

    $this->view->render('employee');
    // } else {
    //   $this->updateEmployee($id);
    // }
  }

  function updateEmployee($id)
  {
    if (!empty($_POST)) {
      $result = $this->model->update($id[0], $_POST);
      if ($result === true) {
        $message = 'Updated employee';
        $messageType = 'success';
      } else {
        $message = $result;
        $messageType = 'error';
      }
      $this->view->message = $message;
      $this->view->messageType = $messageType;
    }
    $this->getByIdEmployee($id);
  }

  function deleteEmployee($id)
  {
    $result = $this->model->delete($id[0]);
    if ($result) {
      $message = 'Deleted employee';
      $messageType = 'success';
    } else {
      $message = 'Error deleting the employee';
      $messageType = 'error';
    }
    $this->view->message = $message;
    $this->view->messageType = $messageType;
  }
}
