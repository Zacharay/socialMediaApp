<?php

require_once "Model.php";

class UserModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function registerUser($name, $surname, $username, $email, $password, $job) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, surname, username, email, job, password) VALUES (:name, :surname, :username, :email, :job, :password)";

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':job', $job);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            return $this->getLastInsertId();
        } else {
            return false;
        }
    }
    public function loginUser($username, $enteredPassword) {
        $query = "SELECT id, password FROM users WHERE username = :username";
        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($enteredPassword, $user['password'])) {
            return $user['id'];
        } else {
            return false;
        }
    }
    public function searchUsers($userInput)
    {
        $query = "SELECT users.id, users.name, users.surname FROM users WHERE CONCAT(users.name, users.surname) LIKE :user_input";

        $stmt = $this->prepareQuery($query);
        $userInput = '%' . $userInput . '%'; 
        $stmt->bindParam(':user_input', $userInput, PDO::PARAM_STR);
        $stmt->execute();

        $data = array(); 

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'surname' => $row['surname']
            );
        }
        return $data;
    }
    public function doesUsernameExists($username)
    {
        $query = "SELECT COUNT(*) FROM users WHERE users.username = :username";

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(":username",$username);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return($count>0);

    }
    public function doesEmailExists($email)
    {
        $query = "SELECT COUNT(*) FROM users WHERE users.email = :email";

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return($count>0);
    }
    
}
?>