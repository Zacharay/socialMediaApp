<?php
require_once "Model.php";

class CommentModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    public function publishComment($userID,$postID,$commentContent)
    {
        $query = "INSERT INTO comments VALUES (NULL,:post_id,:user_id,:commentContent,:uploadDate)";
        $date = date('y-m-d');
        
        $stmt = $this->prepareQuery($query);

        $stmt->bindParam(":post_id",$postID);
        $stmt->bindParam(":user_id",$userID);
        $stmt->bindParam(":commentContent",$commentContent);
        $stmt->bindParam(":uploadDate",$date);
        
        $stmt->execute();

    }
    public function getPostComments($postID)
    {
        $query = "SELECT user_id ,users.name,users.surname,content,upload_date from comments inner join users on users.id = comments.user_id where comments.post_id = :postID";

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(":postID",$postID);
        $stmt->execute();

        $comments = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $comments[]=array(
                'user_id'=>$row['user_id'],
                'userName' => $row['name'],
                'userSurname' => $row['surname'],
                'content' => $row['content'],
                'uploadDate' => $row['upload_date'],
            ); 
        }
        return $comments;
    }

    
}

?>