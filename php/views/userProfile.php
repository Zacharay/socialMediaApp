<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/userProfile.css">
    <script src="https://kit.fontawesome.com/555617a6c2.js" crossorigin="anonymous"></script>
    <title>Social Media</title>
</head>
<body>
    <?php
    include "../database.php";
    
    $db = new Database();
    $userID = isset($_GET['userID']) ? $_GET['userID'] : -1;

    $queryStr = "SELECT Name,Surname,Job,description,following,followers FROM users WHERE users.UserID = $userID";
    $queryResult = $db->selectQuery($queryStr);
    if ($queryResult) {
        
        $userData = $queryResult->fetch_assoc();
        
       
        $name = $userData['Name'];
        $surname = $userData['Surname'];
        $job = $userData['Job'];
        $description = $userData['description'];
        $followers = $userData['following'];
        $following = $userData['followers'];
    
        $description = 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint a assumenda modi deleniti eveniet inventore nam voluptate sapiente eum quibusdam! Id, voluptates obcaecati? Laudantium nostrum similique architecto, delectus enim sequi quos labore perferendis provident tenetur, aliquid vitae eius cupiditate hic?';

    } else {
        // Handle query error
        echo "Error: ";
    }
    $queryStr = "SELECT twitterLink,instagramLink,facebookLink,linkedinLink FROM socialLinks WHERE socialLinks.userID = $userID";
    $queryResult = $db->selectQuery($queryStr);
    if ($queryResult) {
        $userData = $queryResult->fetch_assoc();
        
        if($userData!=NULL)
        {
             $twitterLink = $userData['twitterLink'];
            $instagramLink = $userData['instagramLink'];
            $facebookLink = $userData['facebookLink'];
            $linkedinLink = $userData['linkedinLink']; 
        }
    }
    ?>
    <?php 
    require "../includes/navbar.php" ;
    // include "../includes/createPostModal.php";
    ?>

    <header class="userProfile__section--gray">
        <div class="userProfile__header container">
            <div class="userProfile__header__wrapper">
                <img src="../../images/profilePhotos/userPhoto_<?=$userID?>.png" class="userProfile__photo"/>
                <div>
                    <h1 class="userProfile__name"><?= $name." ".$surname?></h1>
                    <h2 class="userProfile__occupation"><?= $job?></h2>

                    <p class="userProfile__description <?=$description==''?'hidden':''?>">
                        <span>Professional Experience</span></br>
                        <?=$description?>
                    </p>
                </div>
            </div>
            <div>
                <ul class="userProfile__socials__container">
                    <?=
                        isset($facebookLink)&&$facebookLink!=NULL?'
                        <li>
                            <a href="'.$facebookLink.'" target="_blank">
                                <img src="../../images/icons/facebookIcon.webp" alt="Facebook Logo" class="userProfile__socials__image"/>
                            </a>
                        </li>':'';
                    ?>
                    <?=
                        isset($twitterLink)&&$twitterLink!=NULL?'
                        <li>
                            <a href="'.$twitterLink.'" target="_blank">
                                <img src="../../images/icons/twitterIcon.png" alt="Twitter Logo" class="userProfile__socials__image"/>
                            </a>
                        </li>':'';
                    ?>
                    <?=
                        isset($instagramLink)&&$instagramLink!=NULL?'
                        <li>
                            <a href="'.$instagramLink.'" target="_blank">
                                <img src="../../images/icons/instagramIcon.webp" alt="Instagram Logo" class="userProfile__socials__image"/>
                            </a>
                        </li>':'';
                    ?>
                    <?=
                        isset($linkedinLink)&&$linkedinLink!=NULL?'
                        <li>
                            <a href="'.$linkedinLink.'" target="_blank">
                                <img src="../../images/icons/linkedinIcon.webp" alt="Linkedin Logo" class="userProfile__socials__image"/>
                            </a>
                        </li>':'';
                    ?>
                </ul>
                <button class="btn--primary message__btn"><i class="fa-regular fa-envelope"></i>Send Message</button>
            </div>
        </div>
        <div class="followers__container container">
            <div class="followers__element">
                <h4><?=$followers?></h4>
                <p>Followers</p>
            </div>
            <div class="followers__element">
                <h4><?=$following?></h4>
                <p>Following</p>
            </div>
            <button class="btn--primary followers__btn"><i class="fa-regular fa-heart"></i>Follow</button>
        </div>
    </header>
    <section class="container post__section">
        <div class="post__container">
            <div class="post__info">
                <img src="../../images/profilePhotos/userPhoto_62.png" alt="profile photo" class="post__userphoto"/>
                <div>
                    <h2 class="post__username">Bill Gates</h2>
                    <h3 class="post__date">Created at: 11-09-2023</h3>
                </div>
            </div>
            <div class="post__content">
                <p class="post__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos molestias iste est. Eius cupiditate reiciendis dolore vero, esse necessitatibus similique voluptate laboriosam. Amet delectus similique illum dicta expedita autem quo dolorem, optio sunt cupiditate deserunt totam eum fuga sit ratione aperiam iusto omnis maxime! Dolore nostrum voluptatum doloribus numquam fugit laborum, et impedit corrupti? Ab, temporibus. Quod consequatur facilis vel. Alias quae animi quisquam delectus praesentium id dignissimos. Vel eos animi laborum dicta distinctio rerum adipisci illum et doloremque id obcaecati, sed odio ad voluptatum optio? Temporibus pariatur earum facere quisquam aut, exercitationem laborum cumque fuga vitae qui at corporis.</p>
                <div class="slider__container">
                    <div class="slider">
                        <div class="slider__slide">
                            <img class="slider__image" src="../../images/postPhotos/postPhoto--1.webp" alt="post image"/>
                        </div>
                        <div class="slider__slide">
                            <img class="slider__image" src="../../images/postPhotos/postPhoto--2.jpg" alt="post image"/>
                        </div>
                        <div class="slider__slide">
                            <img class="slider__image" src="../../images/postPhotos/postPhoto--3.jpg" alt="post image"/>
                        </div>
                        <div class="slider__slide">
                            <img class="slider__image" src="../../images/profilePhotos/userPhoto_1.png" alt="post image"/>
                        </div>
                        <div class="slider__slide">
                            <img class="slider__image" src="../../images/postPhotos/postPhoto--4.jpeg" alt="post image"/>
                        </div>
                    </div>
                    <div class="slider__button slider__next"><i class="fa-solid fa-chevron-right"></i></div>
                    <div class="slider__button slider__prev"><i class="fa-solid fa-chevron-left"></i></div>
                </div>
                
            </div>
            
            <h4 class="likes__number">Likes: 225</h4>
            <div class="post__action__container">
                <div class="post__action"><i class="fa-regular fa-heart"></i>Like </div>
                <div class="post__action"><i class="fa-regular fa-comment"></i>Comment</div>
                <div class="post__action"><i class="fa-regular fa-share-from-square"></i>Share</div>
            </div>
        </div>
        <div class="post__container">
            <div class="post__info">
                <img src="../../images/profilePhotos/userPhoto_62.png" alt="profile photo" class="post__userphoto"/>
                <div>
                    <h2 class="post__username">Bill Gates</h2>
                    <h3 class="post__date">Created at: 11-09-2023</h3>
                </div>
            </div>
            <div class="post__content">
                <p class="post__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos molestias iste est. Eius cupiditate reiciendis dolore vero, esse necessitatibus similique voluptate laboriosam. Amet delectus similique illum dicta expedita autem quo dolorem, optio sunt cupiditate deserunt totam eum fuga sit ratione aperiam iusto omnis maxime! Dolore nostrum voluptatum doloribus numquam fugit laborum, et impedit corrupti? Ab, temporibus. Quod consequatur facilis vel. Alias quae animi quisquam delectus praesentium id dignissimos. Vel eos animi laborum dicta distinctio rerum adipisci illum et doloremque id obcaecati, sed odio ad voluptatum optio? Temporibus pariatur earum facere quisquam aut, exercitationem laborum cumque fuga vitae qui at corporis.</p>
                <div class="slider__container">
                    <div class="slider">
                        <div class="slider__slide">
                            <img class="slider__image" src="../../images/postPhotos/postPhoto--1.webp" alt="post image"/>
                        </div>
                        <div class="slider__slide">
                            <img class="slider__image" src="../../images/postPhotos/postPhoto--2.jpg" alt="post image"/>
                        </div>
                        <div class="slider__slide">
                            <img class="slider__image" src="../../images/postPhotos/postPhoto--3.jpg" alt="post image"/>
                        </div>
                        <div class="slider__slide">
                            <img class="slider__image" src="../../images/profilePhotos/userPhoto_1.png" alt="post image"/>
                        </div>
                        <div class="slider__slide">
                            <img class="slider__image" src="../../images/postPhotos/postPhoto--4.jpeg" alt="post image"/>
                        </div>
                    </div>
                    <div class="slider__button slider__next"><i class="fa-solid fa-chevron-right"></i></div>
                    <div class="slider__button slider__prev"><i class="fa-solid fa-chevron-left"></i></div>
                </div>
                
            </div>
            
            <h4 class="likes__number">Likes: 225</h4>
            <div class="post__action__container">
                <div class="post__action"><i class="fa-regular fa-heart"></i>Like </div>
                <div class="post__action"><i class="fa-regular fa-comment"></i>Comment</div>
                <div class="post__action"><i class="fa-regular fa-share-from-square"></i>Share</div>
            </div>
        </div>
    </section>
    <script src="../../js/slider.js"></script>
</body>
</html>