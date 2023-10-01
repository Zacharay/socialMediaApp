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
        require_once "../includes/navbar.php"
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
            <div class="settings__content" id="settings__publicProfile">
                <h1 class="settings__title"> Public Profile</h1>
                <div class="settings__photo__container">
                    <img src="../../images/profilePhotos/userPhoto_2.png" alt="userPhoto"/>
                    <div>
                        <a href="../views/uploadPhoto.php" class="btn--primary">Change Picture</a>
                        <a href="../views/uploadPhoto.php" class="btn--primary">Delete Picture</a>
                    </div>
                </div>
                <form method="POST" action="../controllers/updateProfile.php" class="settings__form">
                    <div class="settings__form__wrapper">
                        <label class="settings__form__label">Name <input type="text" name="name"/></label>
                        <label class="settings__form__label">Surname<input type="text" name="surname"/><label>
                    </div>
                   <label class="settings__form__label">Username<input type="text" name="username"/></label>
                   <label class="settings__form__label">Profession<input type="text" name="job"/></label>
                   <label class="settings__form__label">Bio<textarea name="bio"></textarea></label>
                   <button class="btn--primary ">Update</button>
                </form>
            </div>
            <div class="settings__content settings__hidden"id="settings__account">
                <h1 class="settings__title"> Account Settings</h1>
            </div>
            <div class="settings__content settings__hidden" id="settings__socials">
                <h1 class="settings__title">Other Accounts</h1>
            </div>
        </div>
    </section>
    <script src="../../js/profileSettings.js"></script>
    <script src="../../js/loadTheme.js"></script>
</body>
</html>