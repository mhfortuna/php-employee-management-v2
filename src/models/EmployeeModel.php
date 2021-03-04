<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

class EmployeeModel extends Model
{
    function addEmployee(array $employee)
    {
        $query = "INSERT INTO employees (" . implode(', ', array_keys($employee)) . ") VALUES " .
            '(' . implode(', ', array_map(function ($key) {
                return ":$key";
            }, array_keys($employee))) . ')';

        try {
            $this->query($query, $employee, false);
            return $this->query("SELECT * FROM employees WHERE phoneNumber = ?", [$employee['phoneNumber']])[0];
        } catch (PDOException $e) {
            return null;
        }
    }

    function deleteEmployee(string $id) //OK
    {
        try {
            $this->query("DELETE FROM employees WHERE id = ?", [$id], false);
        } catch (PDOException $e) {
            return null;
        }
    }

    function updateEmployee(array $employee)
    {
        $id = $employee['id'];
        unset($employee['id']);

        $query = "UPDATE employees SET " .
            implode(', ', array_map(function ($key) {
                return "$key = :$key";
            }, array_keys($employee)))
            . " WHERE id = :id;";

        $employee['id'] = $id;

        try {
            $this->query($query, $employee, false);
        } catch (PDOException $e) {
            return null;
        }
        return $employee;
    }

    function getEmployee(string $id) //OK
    {
        try {
            return $this->query("SELECT * FROM employees WHERE id = ?", [$id])[0];
        } catch (PDOException $e) {
            return null;
        }
    }

    function getEmployees() //OK
    {
        try {
            return $this->query("SELECT * FROM employees");
        } catch (PDOException $e) {
            return null;
        }
    }
}
