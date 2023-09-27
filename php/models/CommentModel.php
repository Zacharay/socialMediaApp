<?php
require_once "Model.php";

class CommentModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    public function publishComment($userID,$postID,$commentContent)
    {
        $query = "INSERT INTO comments VALUES (NULL,:post_id,:user_id,:commentContent,:uploadDate)";
        $date = date('d-m-y');
        echo $date;
    }

    
}

?>