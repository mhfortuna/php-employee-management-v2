<?php

class UserModel extends Model
{
    function addUser(array $user)
    {
        $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

        try {
            $this->query($query, $user, false);
            return $this->query("SELECT * FROM users WHERE email = ?", [$user['email']])[0];
        } catch (PDOException $e) {
            return null;
        }
    }

    function deleteUser(string $id) //OK
    {
        try {
            $this->query("DELETE FROM users WHERE id = ?", [$id], false);
        } catch (PDOException $e) {
            return null;
        }
    }

    function updateUser(array $user)
    {
        $query = "UPDATE users SET name=:name, email=:email WHERE id = :id";
        // For now, the user won't be able to update its password
        // Maybe on the future it gets implemented ^^
        $password = $user['password'];
        unset($user['password']);
        try {
            $this->query($query, $user, false);
        } catch (PDOException $e) {
            return null;
        }
        $user['password'] = $password;
        return $user;
    }

    function getUsers() //OK
    {
        try {
            return $this->query("SELECT * FROM users");
        } catch (PDOException $e) {
            return null;
        }
    }
}
