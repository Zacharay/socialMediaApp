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

    $queryStr = "SELECT name,surname,job,bio FROM users WHERE users.id = $userID";
    $queryResult = $db->selectQuery($queryStr);
   
    if ($queryResult) {
        
        $userData = $queryResult->fetch_assoc();
        
       
        $name = $userData['name'];
        $surname = $userData['surname'];
        $job = $userData['job'];
        $description = $userData['bio'];

    
        $description = 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint a assumenda modi deleniti eveniet inventore nam voluptate sapiente eum quibusdam! Id, voluptates obcaecati? Laudantium nostrum similique architecto, delectus enim sequi quos labore perferendis provident tenetur, aliquid vitae eius cupiditate hic?';

    } else {
        // Handle query error
        echo "Error: ";
    }

    
    $queryStr = "SELECT twitterLink,instagramLink,facebookLink,linkedinLink FROM socialLinks WHERE socialLinks.user_id = $userID";
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
                <button class="btn--primary" id="message__btn"><i class="fa-regular fa-envelope"></i>Send Message</button>
            </div>
        </div>
        <div class="followers__container container">
            <div class="followers__element">
                <h4><?=0?></h4>
                <p>Followers</p>
            </div>
            <div class="followers__element">
                <h4><?=0?></h4>
                <p>Following</p>
            </div>
            <button class="btn--primary " id="followers__btn"><i class="fa-regular fa-heart"></i>Follow</button>
        </div>
    </header>
    <section class="container post__section">
    <?php include "../includes/postContainer.php";
        renderUsersPost($userID,true);
    ?>
    </section>
    <script src="../../js/slider.js"></script>
</body>
</html>