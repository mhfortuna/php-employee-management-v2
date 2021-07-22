<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */
// session_start();

class EmployeeModel extends Model
{
  function get()
  {
    try {
      $query = $this->db->connect()->prepare("SELECT id, first_name, email, age, street_number, city, state, postal_code, phone_number FROM employee;");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e;
    }
  }

  function insert($employeeArray)
  {
    try {
      $request = "
      INSERT INTO employee
        (first_name,
        last_name,
        email,
        gender,
        city,
        street_number,
        state,
        age,
        postal_code,
        phone_number)
      VALUES 
        ('{$employeeArray['name']}',
        '{$employeeArray['lastName']}',
        '{$employeeArray['email']}',
        '{$employeeArray['gender'][0]}',
        '{$employeeArray['city']}',
        '{$employeeArray['streetAddress']}',
        '{$employeeArray['state']}',
        {$employeeArray['age']},
        '{$employeeArray['postalCode']}',
        '{$employeeArray['phoneNumber']}');
      ";
      $query = $this->db->connect()->prepare($request);
      $query->execute();
      return true;
    } catch (PDOException $e) {
      return $e->getMessage();
    }


    //! Destruct to close connection

  }

  function getById(int $id)
  {
    try {
      $query = $this->db->connect()->prepare("SELECT * FROM employee WHERE id = {$id};");
      $query->execute();
      $result = $query->fetch();
      return $result;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  function update(int $id, $employeeArray = [])
  {
    try {
      $request = "
      UPDATE employee
      SET 
        first_name = '{$employeeArray['name']}',
        last_name = '{$employeeArray['lastName']}',
        email = '{$employeeArray['email']}',
        gender = '{$employeeArray['gender'][0]}',
        city = '{$employeeArray['city']}',
        street_number = '{$employeeArray['streetAddress']}',
        state = '{$employeeArray['state']}',
        age = {$employeeArray['age']},
        postal_code = '{$employeeArray['postalCode']}',
        phone_number = '{$employeeArray['phoneNumber']}'
      WHERE id = {$id};
      ";
      $query = $this->db->connect()->prepare($request);
      $query->execute();
      return true;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  function delete(int $id)
  {
    try {
      $query = $this->db->connect()->prepare("DELETE FROM employee WHERE id = {$id};");
      $query->execute();
      if (($query->rowCount()) > 0) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      return $e->getMessage();
    }







    //Create instance of DataBase object and call connected method

    // define the query to update the employee by id
    //...
    // For query success:
    $employee = $id;
    return $employee;
  }
}




// function getAllEmployees($path)
// {
//   $data = file_get_contents($path);
//   $data = json_decode($data, true);
//   return $data;
// }

// function addEmployee(array $newEmployee)
// {
//   $path = "../../resources/employees.json";
//   $allEmployees = getAllEmployees($path);
//   $lastId = getNextIdentifier($allEmployees);
//   $newEmployee["id"] = $lastId + 1;
//   if (isset($newEmployee["gender"])) {
//     $gender = $newEmployee["gender"];
//     for ($i = 0; $i < count($gender); $i++) {
//       $genderPost = $gender[$i];
//     }
//     $newEmployee["gender"] = $genderPost;
//   }
//   $allEmployees[] = $newEmployee;
//   file_put_contents("../../resources/employees.json", json_encode($allEmployees));
//   return $newEmployee;
// }

// function deleteEmployee($id)
// {
//   $path = "../../resources/employees.json";
//   $allEmployees = getAllEmployees($path);
//   foreach ($allEmployees as $key => $value) {
//     if ($value['id'] == $id) {
//       $employeeToDelete = $key;
//     }
//   }
//   unset($allEmployees[$employeeToDelete]);
//   $allEmployees = array_values($allEmployees);
//   file_put_contents("../../resources/employees.json", json_encode($allEmployees));
//   return $employeeToDelete;
// }


// function updateEmployee(array $updateEmployee)
// {
//   $json = file_get_contents("../../resources/employees.json");
//   $json = json_decode($json, true);
//   $gender = $_POST["gender"];
//   for ($i = 0; $i < count($gender); $i++) {
//     $genderPost = $gender[$i];
//   }
//   // print_r($genderPost);
//   $employeeUpdate = array(
//     'name' => $_POST['name'],
//     'lastName' => $_POST['lastName'],
//     'email' => $_POST['email'],
//     'gender' => $genderPost,
//     'city' => $_POST['city'],
//     'streetAddress' =>  $_POST['streetAddress'],
//     'state' => $_POST['state'],
//     'age' => $_POST['age'],
//     'postalCode' => $_POST['postalCode'],
//     'phoneNumber' => $_POST['phoneNumber']
//   );
//   print_r($employeeUpdate);
//   $result = array();

//   foreach ($json as $key) {
//     if ($key['id'] === $_SESSION['employeeUpdate']['id']) {
//       $employeeUpdate['id'] = $_SESSION['employeeUpdate']['id'];
//       $key = $employeeUpdate;
//       $_SESSION['employeeUpdate'] = $key;
//     }
//     array_push($result, $key);
//   }
//   $fileOpen = fopen("../../resources/employees.json", "w");
//   fwrite($fileOpen, json_encode($result));
//   fclose($fileOpen);
//   //unset($_SESSION['employeeUpdate']);

//   //print_r($_SESSION['employeeUpdate']);
//   header("Location: ../employee.php?okUpdate=true");
// }


// function getEmployee(string $id)
// {

//   $json = file_get_contents("../../resources/employees.json");
//   $json = json_decode($json, true);
//   foreach ($json as $key => $value) {
//     if ($value['id'] == $id) {
//       if (!isset($value['lastName'])) {
//         $value['lastName'] = "";
//       }
//       if (!isset($value['gender'])) {
//         $value['gender'] = "";
//       }
//       var_dump($value);
//       $_SESSION['employeeUpdate'] = $value;
//       header("Location: ../employee.php");
//     }
//   }
// }


// function removeAvatar($id)
// {
//   // TODO implement it
// }

// function getNextIdentifier(array $employeesCollection)
// {
//   $object = array_reduce($employeesCollection, function ($a, $b) {
//     return $a ? ($a["id"] > $b["id"] ? $a : $b) : $b;
//   });
//   return $object["id"];
// }
