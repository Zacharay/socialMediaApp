
<head>
    <link rel="stylesheet" href="../../styles/navbar.css"/>
</head>
<body>
    <?php 
    session_start();
    $currentUserID = $_SESSION['userID'];
    ?>
    <nav class="main__nav">
        <div class="container navbar__container">
            <a class="navbar__logo" href="../views/mainView.php"><i class="fa-solid fa-house"></i>MyMedia</a>
            <div class="navbar__action__container">
                <div class="search__container">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" class="search__input" placeholder="Search"/>
                    <ul class="search__container__preview">

                    </ul>
                </div>
                <a class="btn--primary" id="btn__createPost">Create Post</a>
                <div class="navbar__userProfile">
                    <img src="../../images/profilePhotos/userPhoto_<?=$currentUserID ?>.png" alt="User profile photo">
                    <div class="userProfile__dropdown">
                        <ul class="userProfile__dropdown__list">
                            <li class="userProfile__dropdown__listItem"><a href="../views/userProfile.php?userID=<?=$currentUserID ?>"><i class="fa-regular fa-user"></i> Profile</a></li>
                            <li class="userProfile__dropdown__listItem"><a href="../views/profileSettingsView.php"><i class="fa-solid fa-gear"></i>Settings</a></li>
                            <li class="userProfile__dropdown__listItem" id="theme__btn"><i class="fa-regular fa-moon"></i> Dark Theme</li>
                            <li class="userProfile__dropdown__listItem" id="userProfile__dropdown__logoutBtn"><a href="../controllers/logoutController.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <?php require "createPostModal.php"; ?>
    <script src="../../js/searchbar.js"></script>
    <script src="../../js/loadTheme.js"></script>
</body>
