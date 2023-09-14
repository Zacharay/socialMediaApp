<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../styles/navbar.css"/>
</head>
<body>
    <?php 
    session_start();
    $userID = $_SESSION['userID'];
    ?>
    <nav>
        <div class="container navbar__container">
            <a class="navbar__logo" href="../views/mainView.php"><i class="fa-solid fa-house"></i>Facebook</a>
            <div class="navbar__action__container">
                <div class="search__container">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" class="search__input" placeholder="Search"/>
                </div>
                <a class="btn--primary btn__createPost" href="../views/createPostView.php">Create Post</a>
                <div class="navbar__userProfile">
                    <img src="../../images/profilePhotos/userPhoto_<?=$userID ?>.png" alt="User profile photo">
                    <div class="userProfile__dropdown">
                        <ul class="userProfile__dropdown__list">
                            <li class="userProfile__dropdown__listItem"><a href="../views/userProfile.php?userID=<?=$userID ?>"><i class="fa-regular fa-user"></i> Profile</a></li>
                            <li class="userProfile__dropdown__listItem"><a href="#"><i class="fa-regular fa-moon"></i> Dark Theme</a></li>
                            <li class="userProfile__dropdown__listItem" id="userProfile__dropdown__logoutBtn"><a href="#"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>