<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/main.css"/>
    <link rel="stylesheet" href="../../styles/conversationView.css"/>
    <script src="https://kit.fontawesome.com/555617a6c2.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php 
    require_once "../includes/routing.php";
    require_once "../includes/navbar.php";
    
    ?>
    <section class="conversation__section">
        <aside>
            <input type="text"  class="conversation__search"/>
            <ul class="conversation__list">
                <li class="conversation__element">
                    <img src="../../images/profilePhotos/userPhoto_1.png"/>
                    <div class="conversation__wrapper">
                        <h3>John Doe</h3>
                        <p class="converstation__date"></p>
                    </div>
                    
                    <p class="conversation__showcase__text">Hello world hello world</p>
                </li>
            </ul>
        </aside>
        <main>
            <h1>Alice Smith</h1>
        </main>
    </section>

    <script src="../../js/loadTheme.js"></script>
</body>
</html>