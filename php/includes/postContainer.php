<head>
    <link rel="stylesheet" href="../../styles/postContainer.css">
</head>

        <?php
            require_once "userPost.php";
            
            function renderUsersPost($userID,$onlyCurrentUserPosts)
            {
                $dsn = "mysql:host=localhost;dbname=socialmediaapp;charset=utf8mb4";
                $username = "root";
                $password = "";
                
                $pdo = new PDO($dsn, $username, $password);
                if($onlyCurrentUserPosts)
                {
                    $queryStr = 'SELECT users.name,users.surname,posts.id,content,upload_date,photos_count,likes from posts inner join users on posts.user_id=users.id where users.id = :userID order by posts.id desc';
                    
                    
    
                    
                    $stmt = $pdo->prepare($queryStr);
                    $stmt->bindParam(':userID', $userID);
                
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        // Access the columns in the $row array
                        $userName = $row['name'];
                        $userSurname = $row['surname'];
                        $postID = $row['id'];
                        $content = $row['content'];
                        $uploadDate = $row['upload_date'];
                        $photosCount = $row['photos_count'];
                        $likes = $row['likes'];;
                        echo includePostTemplate($userID,$userName." ".$userSurname,$content,$uploadDate,$likes,$postID,$photosCount);
                    }
                    
                }
                else{
                    $queryStr = 'SELECT users.name,users.surname,posts.id,posts.user_id,posts.content,posts.upload_date,posts.photos_count,posts.likes FROM
                    follows inner join users on follows.following_id = users.id inner join posts on users.id = posts.user_id where follows.follower_id =:userID order by posts.id DESC;';
                    
                    
    
                    
                    $stmt = $pdo->prepare($queryStr);
                    $stmt->bindParam(':userID', $userID);
                
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $userName = $row['name'];
                        $userSurname = $row['surname'];
                        $postUserID = $row['user_id'];
                        $postID = $row['id'];
                        $content = $row['content'];
                        $uploadDate = $row['upload_date'];
                        $photosCount = $row['photos_count'];
                        $likes = $row['likes'];;
                        echo includePostTemplate($postUserID,$userName." ".$userSurname,$content,$uploadDate,$likes,$postID,$photosCount);
                    }
                }


            }
            
        ?>

