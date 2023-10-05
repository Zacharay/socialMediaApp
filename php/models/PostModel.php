<?php

require_once "Model.php";
class PostModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    public function getCurrentUserPosts($userID)
    {
        $query= 'SELECT users.name,users.surname,posts.id,content,upload_date,photos_count,likes from posts inner join users on posts.user_id=users.id where users.id = :userID order by posts.id desc';

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(':userID', $userID);
                
        $stmt->execute();

        $posts = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $posts[]=array(
                'userName' => $row['name'],
                'userSurname' => $row['surname'],
                'postID' => $row['id'],
                'content' => $row['content'],
                'uploadDate' => $row['upload_date'],
                'photosCount' => $row['photos_count'],
                'likes' => $row['likes']
            ); 
        }
        return $posts;
    }
    public function getFollowingUsersPosts($userID)
    {
        $query= 'SELECT users.name,users.surname,posts.id,posts.user_id,posts.content,posts.upload_date,posts.photos_count,posts.likes FROM
        follows inner join users on follows.following_id = users.id inner join posts on users.id = posts.user_id where follows.follower_id =:userID order by posts.id DESC;';

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(':userID', $userID);
                
        $stmt->execute();

        $posts = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $posts[]=array(
                'user_id'=>$row['user_id'],
                'userName' => $row['name'],
                'userSurname' => $row['surname'],
                'postID' => $row['id'],
                'content' => $row['content'],
                'uploadDate' => $row['upload_date'],
                'photosCount' => $row['photos_count'],
                'likes' => $row['likes']
            ); 
        }
        return $posts;
    }
    public function getPostByID($postID)
    {
        $query= 'SELECT users.name,users.surname,posts.user_id,posts.id,content,upload_date,photos_count,likes from posts inner join users on posts.user_id=users.id where  posts.id=:postID';

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(':postID', $postID);
                
        $stmt->execute();

        $postData = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $postData[]=array(
                'user_id'=>$row['user_id'],
                'userName' => $row['name'],
                'userSurname' => $row['surname'],
                'postID' => $row['id'],
                'content' => $row['content'],
                'uploadDate' => $row['upload_date'],
                'photosCount' => $row['photos_count'],
                'likes' => $row['likes']
            ); 
        }
        return $postData;
    }
    public function getAllUserLikedPosts($userID){
        $query = 'SELECT likes.post_id FROM likes where likes.user_id =:userID';

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(":userID",$userID);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

}

?>