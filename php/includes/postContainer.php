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

                for($i = 0;$i<count($posts);$i++)
                {
                        $userName = $posts[$i]['userName'];
                        $userSurname = $posts[$i]['userSurname'];
                        $postID = $posts[$i]['postID'];
                        $content = $posts[$i]['content'];
                        $uploadDate = $posts[$i]['uploadDate'];
                        $photosCount = $posts[$i]['photosCount'];
                        $likes = $posts[$i]['likes'];
                        echo includePostTemplate($userID,$userName." ".$userSurname,$content,$uploadDate,$likes,$postID,$photosCount);
                }


            }
            
        ?>

