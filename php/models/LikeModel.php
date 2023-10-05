<?php

require_once "Model.php";

class LikeModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function insertLike($postID,$userID)
    {
        $query = "
        INSERT INTO likes VALUES(null,:userID,:postID);
        UPDATE posts set likes = likes+1 where posts.id = :postID;
        ";
        
        $stmt = $this->prepareQuery($query);

        $stmt->bindParam(':userID',$userID);
        $stmt->bindParam(':postID',$postID);

        $stmt->execute();
    }
    public function deleteLike($postID,$userID)
    {
        $query = "
        DELETE FROM likes WHERE likes.user_id=:userID and likes.post_id=:postID;
        UPDATE posts set likes = likes-1 where posts.id = :postID;";
        $stmt = $this->prepareQuery($query);

        $stmt->bindParam(':userID',$userID);
        $stmt->bindParam(':postID',$postID);

        $stmt->execute();
    }
}

?>