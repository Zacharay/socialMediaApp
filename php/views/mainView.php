<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/main.css">
    <script src="https://kit.fontawesome.com/555617a6c2.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body data-theme='dark'>
    <?php 
    require "../includes/navbar.php";
    ?>
    <section class="post__section">
        <?php 

            include "../includes/postContainer.php";
            renderUsersPost($currentUserID,true);
        ?>
    </section>
    <script src="../../js/slider.js"></script>
    <script src="../../js/loadPosts.js"></script>
    <script src="../../js/loadTheme.js"></script>
</body>
</html>