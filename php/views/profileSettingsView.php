<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/profileSettings.css">
    <script src="https://kit.fontawesome.com/555617a6c2.js" crossorigin="anonymous"></script>
    <title>Profile Settings</title>
</head>
<body>
    <?php
        require_once "../includes/navbar.php";
        require_once "../models/UserModel.php";


        if(isset($_SESSION["userID"])){
            $userModel = new UserModel();
            $userID= $_SESSION["userID"];
            $userData = $userModel->getAllUserDataById($userID);

            $name = $userData[0]['name'];
            $surname = $userData[0]['surname'];
            $username = $userData[0]['username'];
            $email = $userData[0]['email'];
            $job = $userData[0]['job'];
            $bio =$userData[0]['bio'];
            $twitterLink = $userData[0]['twitter'];
            $instagramLink = $userData[0]['instagram'];
            $facebookLink = $userData[0]['facebook'];
            $linkedinLink = $userData[0]['linkedin']; 
        }
        else{
            header("Location: ../../index.php");
        }




    ?>
    <section class="settings__container">
        <nav class="settings__nav">
            <h1 class="settings__title">Settings</h1>
            <ul class="settings__nav__list">
                <li class="settings__nav__btn settings__nav__btn--active" id="publicProfile__btn"><i class="fa-solid fa-user"></i>Public profile</li>
                <li class="settings__nav__btn" id="account__btn"><i class="fa-solid fa-gear"></i>Account settings</li>
                <li class="settings__nav__btn" id="socials__btn"><i class="fa-solid fa-hashtag"></i>Other accounts</li>    
            <ul>
        </nav>
        <div class="settings__main">
            <div class="settings__content " id="settings__publicProfile">
                <h1 class="settings__title"> Public Profile</h1>
                <div class="settings__photo__container">
                    <img src="../../images/profilePhotos/userPhoto_<?=$userID?>.png" alt="userPhoto"/>
                    <div>
                        <a href="../views/uploadPhoto.php" class="btn--primary">Change Picture</a>
                        <a href="../views/uploadPhoto.php" class="btn--primary">Delete Picture</a>
                    </div>
                </div>
                <form method="POST" action="../controllers/updateProfileController.php?userID=<?=$userID?>" class="settings__form">
                    <div class="settings__form__wrapper">
                        <label class="settings__form__label">Name <input type="text" name="name" value="<?=$name?>"/></label>
                        <label class="settings__form__label">Surname<input type="text" name="surname" value="<?=$surname?>"/><label>
                    </div>
                   <label class="settings__form__label">Username<input type="text" name="username" value="<?=$username?>"/></label>
                   <label class="settings__form__label">Profession<input type="text" name="job" value="<?=$job?>"/></label>
                   <label class="settings__form__label">Bio<textarea name="bio" ><?=$bio?></textarea></label>
                   <button class="btn--primary ">Update</button>
                </form>
            </div>
            <div class="settings__content settings__hidden"id="settings__account">
                <h1 class="settings__title"> Account Settings</h1>
                <div class="settings__account__btns">
                    <button class="btn--primary settings__account__btn">Change Email</button>
                    
                    <button class="btn--primary settings__account__btn">Change Password</button>
                    <button class="btn--primary settings__account__btn">Delete Account</button>
                </div>
                <div class="settings__account__verification settings__hidden">
                    <h3>We sent verification code to your email: alice_smith@example.com</h3>
                    <label class="settings__form__label settings__account__label">Verification Code<input type="number" pattern="\d{1,6}"/></label>
                    <label class="settings__form__label settings__account__label">New Email<input type="email"/></label>
                    <label class="settings__form__label settings__account__label">Confirm Email<input type="email"/></label>
                    <div class="account__btn__container">
                        <button class="btn--primary account__back__btn"><i class="fa-solid fa-arrow-left"></i>Back</button>
                        <button class="btn--primary">Confirm <i class="fa-solid fa-check"></i></button>
                    </div>
                </div>
                <div class="settings__account__verification settings__hidden"> 
                    <h3>We sent verification code to your email: alice_smith@example.com</h3>
                    <label class="settings__form__label settings__account__label">Verification Code<input type="number" pattern="\d{1,6}"/></label>
                    <label class="settings__form__label settings__account__label">Password<input type="password"/></label>
                    <label class="settings__form__label settings__account__label">New Password<input type="password"/></label>
                    <label class="settings__form__label settings__account__label">Confirm Password<input type="password"/></label>
                    <div class="account__btn__container">
                        <button class="btn--primary account__back__btn"><i class="fa-solid fa-arrow-left"></i>Back</button>
                        <button class="btn--primary">Confirm <i class="fa-solid fa-check"></i></button>
                    </div>
                </div>
                <div  class="settings__account__verification settings__hidden">
                    <h3>Are you sure you want to delete your account</h3>
                    <div class="account__btn__container">
                        <button class="btn--primary account__back__btn"><i class="fa-solid fa-arrow-left"></i>Cancel</button>
                        <button class="btn--primary">Confirm <i class="fa-solid fa-check"></i></button>
                    </div>
                </div>
            </div>
            <div class="settings__content settings__hidden" id="settings__socials">
                <h1 class="settings__title">Other Accounts</h1>
                <form method="POST" action="../controllers/updateSocialsController.php?userID=<?=$userID?>" class="settings__form">
                   <label class="settings__form__label">
                        <span>
                            <i class="fa-brands fa-facebook"></i>Facebook 
                        </span>
                        <input type="text" name="facebookLink" value="<?=$facebookLink?>"/>
                    </label>
                    <label class="settings__form__label">
                        <span>
                            <i class="fa-brands fa-instagram"></i>Instagram 
                        </span>
                        <input type="text" name="instagramLink" value="<?=$instagramLink?>"/>
                    </label>
                    <label class="settings__form__label">
                        <span>
                            <i class="fa-brands fa-linkedin"></i>Linkedin
                        </span>
                        <input type="text" name="linkedinLink" value="<?=$linkedinLink?>"/>
                    </label>
                    <label class="settings__form__label">
                        <span>
                            <i class="fa-brands fa-twitter"></i>Twitter
                        </span>
                        <input type="text" name="twitterLink" value="<?=$twitterLink?>"/>
                    </label>
                   <button class="btn--primary ">Update</button>
            </form>
            </div>
        </div>
    </section>
    <script src="../../js/profileSettings.js"></script>
    <script src="../../js/loadTheme.js"></script>
</body>
</html>