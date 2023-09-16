<head>
    <link rel="stylesheet" href="../../styles/postContainer.css">
</head>
<body>
<section class="container post__section">
        <?php
            require_once "userPost.php";
            require_once "../database.php";
            function renderUsersPost($userID,$onlyCurrentUserPosts)
            {
                $db = new Database();
                if($onlyCurrentUserPosts)
                {
                    $queryStr = 'SELECT users.name,users.surname,posts.id,content,upload_date,photos_count from posts inner join users on posts.user_id=users.id where users.id = $userID';
                }
                else{
                    //posts of all followed users
                }


            }
            for($i=0;$i<10;$i++)
            echo includePostTemplate($userID,$name." ".$surname,$description,'11-09-2023',2137 );
        ?>
    <script src="../../js/slider.js"></script>
</section>
</body>
