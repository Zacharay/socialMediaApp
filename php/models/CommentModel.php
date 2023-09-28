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

    
}

?>