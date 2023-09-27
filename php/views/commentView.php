<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/comment.css">
    <script src="https://kit.fontawesome.com/555617a6c2.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php
        include "../includes/navbar.php";
        $postID = isset($_GET['postID'])?$_GET['postID']:-1;

        if($postID==-1)header('Location: 404.php');
    ?>
    <section class="comments__section__container">
        <div class="comments__section">
            <div class="comment">
                <div class="comment__container">
                    <div class="comment__upvote__container">
                        <i class="fa-solid fa-plus "></i>
                        <h4 class="comment__upvote__count">12</h4>
                        <i class="fa-solid fa-minus"></i>
                    </div>
                    <div class="comment__main">
                        <div class="comment__info">
                            <div class="comment__info__user">
                                <img src="../../images/profilePhotos/userPhoto_1.png" class="comment__userImage"/>
                                <h3 class="comment__user__fullname">John Doe</h3>
                            
                                <h4 class="comment__date">20.09.2023</h4>
                                <h4 class="comment__youTag">you</h4>
                            </div>
                            
                            <i class="fa-solid fa-reply comment__replyBtn"></i>
                        </div>
                        <p class="comment__content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, expedita earum! Consectetur beatae dolor dignissimos, excepturi consequuntur, error odit est dicta, accusantium rem iusto voluptatem nemo id amet recusandae architecto!
                        </p>
                    </div>
                </div>
                <div class="replies__container">
                    <div class="comment__container">
                        <div class="comment__upvote__container">
                            <i class="fa-solid fa-plus "></i>
                            <h4 class="comment__upvote__count">12</h4>
                            <i class="fa-solid fa-minus"></i>
                        </div>
                        <div class="comment__main">
                            <div class="comment__info">
                                <div class="comment__info__user">
                                    <img src="../../images/profilePhotos/userPhoto_1.png" class="comment__userImage"/>
                                    <h3 class="comment__user__fullname">John Doe</h3>
                                
                                    <h4 class="comment__date">20.09.2023</h4>
                                    <h4 class="comment__youTag">you</h4>
                                </div>
                                
                                <i class="fa-solid fa-reply comment__replyBtn"></i>
                            </div>
                            <p class="comment__content">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, expedita earum! Consectetur beatae dolor dignissimos, excepturi consequuntur, error odit est dicta, accusantium rem iusto voluptatem nemo id amet recusandae architecto!
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="comment">
                <div class="comment__container">
                    <div class="comment__upvote__container">
                        <i class="fa-solid fa-plus "></i>
                        <h4 class="comment__upvote__count">12</h4>
                        <i class="fa-solid fa-minus"></i>
                    </div>
                    <div class="comment__main">
                        <div class="comment__info">
                            <div class="comment__info__user">
                                <img src="../../images/profilePhotos/userPhoto_1.png" class="comment__userImage"/>
                                <h3 class="comment__user__fullname">John Doe</h3>
                            
                                <h4 class="comment__date">20.09.2023</h4>
                                <h4 class="comment__youTag">you</h4>
                            </div>
                            
                            <i class="fa-solid fa-reply comment__replyBtn"></i>
                        </div>
                        <p class="comment__content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, expedita earum! Consectetur beatae dolor dignissimos, excepturi consequuntur, error odit est dicta, accusantium rem iusto voluptatem nemo id amet recusandae architecto!
                        </p>
                    </div>
                </div>
                <div class="replies__container">
                    <div class="comment__container">
                        <div class="comment__upvote__container">
                            <i class="fa-solid fa-plus "></i>
                            <h4 class="comment__upvote__count">12</h4>
                            <i class="fa-solid fa-minus"></i>
                        </div>
                        <div class="comment__main">
                            <div class="comment__info">
                                <div class="comment__info__user">
                                    <img src="../../images/profilePhotos/userPhoto_1.png" class="comment__userImage"/>
                                    <h3 class="comment__user__fullname">John Doe</h3>
                                
                                    <h4 class="comment__date">20.09.2023</h4>
                                    <h4 class="comment__youTag">you</h4>
                                </div>
                                
                                <i class="fa-solid fa-reply comment__replyBtn"></i>
                            </div>
                            <p class="comment__content">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, expedita earum! Consectetur beatae dolor dignissimos, excepturi consequuntur, error odit est dicta, accusantium rem iusto voluptatem nemo id amet recusandae architecto!
                            </p>
                        </div>
                    </div>
                    <div class="comment__container">
                    <div class="comment__upvote__container">
                        <i class="fa-solid fa-plus "></i>
                        <h4 class="comment__upvote__count">12</h4>
                        <i class="fa-solid fa-minus"></i>
                    </div>
                    <div class="comment__main">
                        <div class="comment__info">
                            <div class="comment__info__user">
                                <img src="../../images/profilePhotos/userPhoto_1.png" class="comment__userImage"/>
                                <h3 class="comment__user__fullname">John Doe</h3>
                            
                                <h4 class="comment__date">20.09.2023</h4>
                                <h4 class="comment__youTag">you</h4>
                            </div>
                            
                            <i class="fa-solid fa-reply comment__replyBtn"></i>
                        </div>
                        <p class="comment__content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, expedita earum! Consectetur beatae dolor dignissimos, excepturi consequuntur, error odit est dicta, accusantium rem iusto voluptatem nemo id amet recusandae architecto!
                        </p>
                    </div>
                </div>
                <div class="comment__container">
                    <div class="comment__upvote__container">
                        <i class="fa-solid fa-plus "></i>
                        <h4 class="comment__upvote__count">12</h4>
                        <i class="fa-solid fa-minus"></i>
                    </div>
                    <div class="comment__main">
                        <div class="comment__info">
                            <div class="comment__info__user">
                                <img src="../../images/profilePhotos/userPhoto_1.png" class="comment__userImage"/>
                                <h3 class="comment__user__fullname">John Doe</h3>
                            
                                <h4 class="comment__date">20.09.2023</h4>
                                <h4 class="comment__youTag">you</h4>
                            </div>
                            
                            <i class="fa-solid fa-reply comment__replyBtn"></i>
                        </div>
                        <p class="comment__content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, expedita earum! Consectetur beatae dolor dignissimos, excepturi consequuntur, error odit est dicta, accusantium rem iusto voluptatem nemo id amet recusandae architecto!
                        </p>
                    </div>
                </div>
                </div>
            </div>
            <div class="comment__publish__container">
                <img src="../../images/profilePhotos/userPhoto_1.png" class="comment__publish__img"/>
            <form method="POST" action="../controllers/commentController.php?postID=<?=$postID?>" class="comment__form">
                <textarea  class="comment__publish__input" placeholder="Add a comment..." name="comment__content"></textarea>
                <button class="comment__publish__btn">SEND</button>
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
        </script>
</body>
</html>