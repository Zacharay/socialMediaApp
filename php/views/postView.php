<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/postView.css">
    <link rel="stylesheet" href="../../styles/postContainer.css">
    <script src="https://kit.fontawesome.com/555617a6c2.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body data-theme='dark'>
    <?php
        include "../includes/navbar.php";
        require_once "../includes/userPost.php";
        require_once "../models/PostModel.php";
        $postID = isset($_GET['postID'])?$_GET['postID']:-1;

        if($postID==-1)header('Location: 404.php');

        $postModel = new PostModel();
        $postData = $postModel->getPostByID($postID);
        if($postData==null)header('Location: 404.php');
        $userID = $postData[0]['user_id'];
        $postID = $postData[0]['postID'];
        $userName = $postData[0]['userName'];
        $userSurname = $postData[0]['userSurname'];
        $postContent = $postData[0]['content'];
        $postDate = $postData[0]['uploadDate'];
        $likesCount =$postData[0]['likes'];
        $photosCount = $postData[0]['photosCount'];

        echo "<section class='comments__post__container'>";
        echo includePostTemplate( $userID,$userName." ".$userSurname,$postContent,$postDate,$likesCount,$postID,$photosCount);
        echo "</section>";
    ?>
    <section class="comments__section__container">
        <div class="comments__section">
            <?php
            require_once "../models/CommentModel.php";
            $commentModel = new CommentModel();

            $commentsData = $commentModel->getPostComments($postID);
            $currentUserID = $_SESSION['userID'];
            for($i=0;$i<count($commentsData);$i++)
            {
                
                $template = file_get_contents('../../templates/comment_template.html');
                $template = str_replace('[[USER_ID]]', $commentsData[$i]['userID'], $template);
                $template = str_replace('[[USER_FULLNAME]]', $commentsData[$i]['userName']." ".$commentsData[$i]['userSurname'], $template);
                $template = str_replace('[[CONTENT]]', $commentsData[$i]['content'], $template);
                
                $template = str_replace('[[UPLOAD_DATE]]', date("d-m-Y", strtotime($commentsData[$i]['uploadDate'])), $template);
                

                if($currentUserID==$commentsData[$i]['userID'])
                {
                    $commentID = $commentsData[$i]['commentID'];
                    $template = str_replace('[[YOUTAG]]','<h4 class="comment__youTag">you</h4>', $template);
                    $template = str_replace('[[DELETE_BTN]]',' <a href="../controllers/deleteCommentController.php?commentID='.$commentID.'&postID='.$postID.'"><i class="fa-solid fa-xmark"></i></a>', $template);
                }
                else{
                    $template = str_replace('[[YOUTAG]]','', $template);
                    $template = str_replace('[[DELETE_BTN]]','', $template);
                }
                echo $template;
            }

          
            

            ?>


            <div class="comment__publish__container">
                <img src="../../images/profilePhotos/userPhoto_<?= $currentUserID?>.png" class="comment__publish__img"/>
            <form method="POST" action="../controllers/commentController.php?postID=<?=$postID?>" class="comment__form">
                <textarea  class="comment__publish__input" placeholder="Add a comment..." name="comment__content"></textarea>
                <button class="comment__publish__btn btn--primary">SEND</button>
            </form>
            </div>
        </div>
        
    </section>
    <script>
            const commentForm = document.querySelector(".comment__form");
            console.log(commentForm);
            commentForm.addEventListener('submit',function(e){
                e.preventDefault();
                const commentContent = document.querySelector(".comment__publish__input").value;
                if(commentContent=='')
                {
                    document.querySelector(".comment__publish__input").style="border:1px solid var(--error-color)";
                }
                else{
                    document.querySelector(".comment__publish__input").style="border:1px solid var(--secondary-light)";
                    this.submit();
                }
            })
            const postContainer =  document.querySelector(".post__container");
            postContainer.style="width:100rem;";
            const sliderContainer = document.querySelector(".slider__container");
            sliderContainer.style="height:100%;";
        
        </script>
        <script src="../../js/loadPosts.js"></script>
        <script src="../../js/slider.js"></script>
</body>
</html>