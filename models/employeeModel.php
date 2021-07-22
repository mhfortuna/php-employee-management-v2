<?php
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
  }

  function insertByAjax($employeeArray)
  {
    try {
      $request = "
      INSERT INTO employee
        (first_name,
        email,
        city,
        street_number,
        state,
        age,
        postal_code,
        phone_number)
      VALUES 
        ('{$employeeArray['first_name']}',
        '{$employeeArray['email']}',
        '{$employeeArray['city']}',
        '{$employeeArray['street_number']}',
        '{$employeeArray['state']}',
        {$employeeArray['age']},
        '{$employeeArray['postal_code']}',
        '{$employeeArray['phone_number']}');
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
  }
}
