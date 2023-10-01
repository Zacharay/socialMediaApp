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
    public function getAllUserDataById($userID)
    {
        $query = "SELECT name,surname,username,email,job,bio,twitterLink,instagramLink,facebookLink,linkedinLink FROM users LEFT OUTER JOIN sociallinks on users.id=sociallinks.user_id WHERE users.id = :userID";

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(":userID",$userID);
        $stmt->execute();    

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$row)return null;

        $data[]=array(
            'name'=>$row['name'],
            'surname'=>$row['surname'],
            'username'=>$row['username'],
            'email'=>$row['email'],
            'job'=>$row['job'],
            'bio'=>$row['bio'],
            'twitter'=>$row['twitterLink'],
            'facebook'=>$row['facebookLink'],
            'instagram'=>$row['instagramLink'],
            'linkedin'=>$row['linkedinLink'],
        );
        return $data;
    }
    public function updatePublicProfileData($userID,$name,$surname,$username,$job,$bio)
    {
        $query = "UPDATE users SET users.name = :name, users.surname = :surname,users.username=:username, users.job = :job,users.bio = :bio WHERE users.id=:userID";

        $stmt = $this->prepareQuery($query);

        $stmt->bindParam(":userID",$userID);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":surname",$surname);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":bio",$bio);
        $stmt->bindParam(":job",$job);

        $stmt->execute();

    }
    public function getUserFollowersAndFollowingCount($userID){
        $query = "
            SELECT
                SUM(CASE WHEN follower_id = :userID THEN 1 ELSE 0 END) AS following_count,
                SUM(CASE WHEN following_id = :userID THEN 1 ELSE 0 END) AS followers_count
            FROM follows
            WHERE follower_id = :userID OR following_id = :userID
        ";
    
        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(":userID", $userID);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return [
            'followers_count' => $row['followers_count'],
            'following_count' => $row['following_count'],
        ];
    }
    public function updateSocialLinks($userID,$facebookLink,$instagramLink,$linkedinLink,$twitterLink)
    {
        $query = "INSERT INTO sociallinks (user_id, facebookLink, instagramLink, linkedinLink, twitterLink)
        VALUES (:userID, :facebookLink, :instagramLink, :linkedinLink, :twitterLink)
        ON DUPLICATE KEY UPDATE
            facebookLink = VALUES(facebookLink),
            instagramLink = VALUES(instagramLink),
            linkedinLink = VALUES(linkedinLink),
            twitterLink = VALUES(twitterLink);";

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':facebookLink', $facebookLink);
        $stmt->bindParam(':instagramLink', $instagramLink);
        $stmt->bindParam(':linkedinLink', $linkedinLink);
        $stmt->bindParam(':twitterLink', $twitterLink);

        $stmt->execute();
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