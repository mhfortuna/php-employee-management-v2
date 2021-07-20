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

  function createEmployee() {
    if (!empty($_POST)) {
      // $name = $_POST['name'];
      // $lastName = $_POST['lastName'];
      // $email = $_POST['email'];
      // $gender = $_POST['gender'];
      // $age = $_POST['age'];
      // $city = $_POST['city'];
      // $streetAddress = $_POST['streetAddress'];
      // $state = $_POST['state'];
      // $postalCode = $_POST['postalCode'];
      // $phoneNumber = $_POST['phoneNumber'];

      //Goes to create model function insert
      $result = $this->model->insert($_POST);
      if ($result) {
          $message = 'New content created';
      } else {
          $message = 'Error creating the employee';
      }
      $this->view->message = $message;
  }
  $this->view->render('employee');
  // $this->render("create");
}

}
