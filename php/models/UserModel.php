<?php

class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registerUser($name, $surname, $username, $email, $password, $job) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, surname, username, email, job, password) VALUES (:name, :surname, :username, :email, :job, :password)";

        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':job', $job);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            return $this->db->getLastInsertId();
        } else {
            return false;
        }
    }
    public function loginUser($username, $enteredPassword) {
        $query = "SELECT id, password FROM users WHERE username = :username";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($enteredPassword, $user['password'])) {
            return $user['id'];
        } else {
            return false;
        }
    }
    public function doesUsernameExists($username)
    {
        $query = "SELECT COUNT(*) FROM users WHERE users.username = :username";

        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(":username",$username);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return($count>0);

    }
    public function doesEmailExists($email)
    {
        $query = "SELECT COUNT(*) FROM users WHERE users.email = :email";

        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return($count>0);
    }
    
}
?>