<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/main.css">
    <script src="https://kit.fontawesome.com/555617a6c2.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php 
    require "../includes/navbar.php";
    ?>
    <section class="container post__section">
        <?php 

            include "../includes/postContainer.php";
            renderUsersPost($currentUserID,false);
        ?>
    </section>
    <script src="../../js/slider.js"></script>
    <script src="../../js/loadPosts.js"></script>
</body>
</html>