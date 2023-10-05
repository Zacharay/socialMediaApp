<head>
    <link rel="stylesheet" href="../../styles/postContainer.css">
</head>

        <?php
            require_once "userPost.php";
            require_once "../models/PostModel.php";
            function renderUsersPost($userID,$getFollowingPosts)
            {
                $postModel = new PostModel();
                $posts = $getFollowingPosts==false?
                $postModel->getCurrentUserPosts($userID):
                $postModel->getFollowingUsersPosts($userID);

                $currentUserLikedPosts = $postModel->getAllUserLikedPosts($userID);
                
                for($i = 0;$i<count($posts);$i++)
                {
                        $postUserID = isset($posts[$i]['user_id'])?$posts[$i]['user_id']:-1;
                        $userName = $posts[$i]['userName'];
                        $userSurname = $posts[$i]['userSurname'];
                        $postID = $posts[$i]['postID'];
                        $content = $posts[$i]['content'];
                        $uploadDate = $posts[$i]['uploadDate'];
                        $photosCount = $posts[$i]['photosCount'];
                        $likes = $posts[$i]['likes'];
                        $isLiked = in_array($postID,$currentUserLikedPosts);
                        echo includePostTemplate($postUserID==-1?$userID:$postUserID,$userName." ".$userSurname,$content,$uploadDate,$likes,$postID,$photosCount,$isLiked);
                }


            }
            
        ?>
   

