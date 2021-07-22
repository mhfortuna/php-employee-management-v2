<?php

class UserModel extends Model
{
     function login()
     {
          try {

               $query = $this->db->connect()->prepare("SELECT password FROM user WHERE email = '{$_POST['email']}'");
               $query->execute();
               $result = $query->fetch();
               if (!$result) {
                    unset($_POST);
                    return false;
               } else {
                    $password = $result['password'];

                    if (password_verify($_POST['password'], $password)) {
                         unset($_POST);
                         return true;
                    }
               }
          } catch (PDOException $e) {
               unset($_POST);
               return false;
          }
     }
}
