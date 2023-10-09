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
<body data-theme='dark'>
    <?php
    require_once "../includes/routing.php";

    include "../models/UserModel.php";
    $userID = isset($_GET['userID']) ? $_GET['userID'] : -1;

    $photoURLProfile = file_exists("../../images/profilePhotos/userPhoto_".$userID.".png")?"../../images/profilePhotos/userPhoto_".$userID.'.png':'../../images/profilePhotos/userPhoto_default.png';

    $userModel = new UserModel();
    $userData = $userModel->getAllUserDataById($userID);

    if ($userData[0]) {
       
        $name = $userData[0]['name'];
        $surname = $userData[0]['surname'];
        $job = $userData[0]['job'];
        $bio =$userData[0]['bio'];
        $twitterLink = $userData[0]['twitter'];
        $instagramLink = $userData[0]['instagram'];
        $facebookLink = $userData[0]['facebook'];
        $linkedinLink = $userData[0]['linkedin']; 
    

        $followsData = $userModel->getUserFollowersAndFollowingCount($userID);
        $followingCount= $followsData['following_count'];
        $followersCount=  $followsData['followers_count'];

    } else {
        header('Location: 404.php');
    }
    ?>
    

    <header class="userProfile__section--gray">
    <?php 
    require "../includes/navbar.php" ;
    
    ?>
        <div class="userProfile__header container">
            <div class="userProfile__header__info">
                <img src="<?=$photoURLProfile ?>" class="userProfile__photo"/>
                <div>
                    <h1 class="userProfile__name"><?= $name." ".$surname?></h1>
                    <h2 class="userProfile__occupation"><?= $job?></h2>

                    <p class="userProfile__description <?=$bio==''?'hidden':''?>">
                        <span>Professional Experience</span></br>
                        <?=$bio?>
                    </p>
                </div>
            </div>
            <div class="userProfile__header__socials">
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
                <?php
                if($currentUserID==$userID)
                    echo ' <a class="btn--primary" id="message__btn" href="profileSettingsView.php"><i class="fa-solid fa-gear"></i>Edit Profile</a>';
                else{
                    echo ' <a class="btn--primary" id="message__btn" href="conversationView.php?userID='.$userID.'"><i class="fa-regular fa-envelope"></i>Send Message</a>';
                }
                ?>
               
            </div>
        </div>
        <div class="followers__container container">
            
            <div class="followers__element">
                <h4><?=$followersCount?></h4>
                <p>Followers</p>
            </div>
            <div class="followers__element <?=$currentUserID==$userID?'followers__element__rightBorder':''?>">
                <h4><?=$followingCount?></h4>
                <p>Following</p>
            </div>
            <?php
            if($currentUserID!=$userID)
            {
                $queryStr = 'SELECT follows.id from follows where follower_id = :currentUserID and following_id =:userID;';
                    
                    
                $dsn = "mysql:host=localhost;dbname=socialmediaapp;charset=utf8mb4";
                $username = "root";
                $password = "";

                $pdo = new PDO($dsn, $username, $password);
                   
                $stmt = $pdo->prepare($queryStr);
                $stmt->bindParam(':userID', $userID);
                $stmt->bindParam(':currentUserID', $currentUserID);
            
                $stmt->execute();
                $rowCount = $stmt->rowCount();

                if ($rowCount > 0) {
                    echo '<button class="btn--primary unfollow__btn" id="followers__btn"><i class="fa-regular fa-heart"></i>Unfollow</button>';
                } else {
                    echo '<button class="btn--primary follow__btn" id="followers__btn"><i class="fa-solid fa-heart"></i>Follow</button>';
                }
                
            }
            ?>

        </div>
    </header>
    
    <section class="post__section">
        <?php include "../includes/postContainer.php";
            renderUsersPost($userID,false);
        ?>
    </section>
    <script src="../../js/loadPosts.js"></script>
    <script src="../../js/followBtn.js"></script>
    <script src="../../js/slider.js"></script>
    <script src="../../js/loadTheme.js"></script>
    <script src="../../js/likeButtons.js"></script>

</body>
</html>