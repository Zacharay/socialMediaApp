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
    require_once "../models/ConversationModel.php";
    
    $currentUserID = $_SESSION['userID'];
    $conversationModel = new ConversationModel();

    $conversations = $conversationModel->getUserConversations($currentUserID);
    
    ?>
    <section class="conversation__section">
        <aside>
            <input type="text"  class="conversation__search"/>
            <ul class="conversation__list">
                <?php 
                foreach($conversations as $conversation)
                {
                    $userID = $conversation['id'];
                    $name = $conversation['name'];
                    $surname = $conversation['surname'];
                    $conversationID = $conversation['conversation_id'];
                    $lastMessage = $conversationModel->getLastMessage($conversationID);
                    $lastMessageContent = $lastMessage['content'];
                    $lastMessageDate = $lastMessage['upload_date'];


                    echo "<li class='conversation__element conversation--active'>                
                        <img src='../../images/profilePhotos/userPhoto_$userID.png' class='conversation__userphoto'/>
                        <div class='conversation__wrapper'>
                            <div class='conversation__header'>
                                <h3 class='conversation__fullname'>$name $surname</h3>
                                <p class='converstation__date'>$lastMessageDate</p>
                            </div>   
                                 <p class='conversation__showcase__text'>$lastMessageContent</p>
                                
                        </div>           
                    </li>";
                }
                ?>
                <!-- <li class="conversation__element conversation--active">                
                    <img src="../../images/profilePhotos/userPhoto_1.png" class="conversation__userphoto"/>
                    <div class="conversation__wrapper">
                        <div class="conversation__header">
                            <h3 class="conversation__fullname">John Doe</h3>
                            <p class="converstation__date">12:49AM</p>
                        </div>   
                            <p class="conversation__showcase__text">Hello world hello world</p>
                        
                    </div>           
                </li>
                <li class="conversation__element">                
                    <img src="../../images/profilePhotos/userPhoto_1.png" class="conversation__userphoto"/>
                    <div class="conversation__wrapper">
                        <div class="conversation__header">
                            <h3 class="conversation__fullname">John Doe</h3>
                            <p class="converstation__date">12:49AM</p>
                        </div>   
                            <p class="conversation__showcase__text">Hello world hello world</p>
                        
                    </div>           
                </li>
                <li class="conversation__element">                
                    <img src="../../images/profilePhotos/userPhoto_1.png" class="conversation__userphoto"/>
                    <div class="conversation__wrapper">
                        <div class="conversation__header">
                            <h3 class="conversation__fullname">John Doe</h3>
                            <p class="converstation__date">12:49AM</p>
                        </div>   
                            <p class="conversation__showcase__text">Hello world hello world</p>
                        
                    </div>           
                </li> -->
            </ul>
        </aside>
        <main >
            <h1 class="conversation__title">Alice Smith</h1>
            <div class="message__container">
                <div class="message message--currentUser">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente perferendis libero minima qui corrupti culpa consectetur incidunt. Velit, quaerat asperiores!
                </div>
                <div class="message--otherUser--first">
                    <img src="../../images/profilePhotos/userPhoto_2.png"/>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="message message--currentUser">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente perferendis libero minima qui corrupti culpa consectetur incidunt. Velit, quaerat asperiores!
                </div>
                <div class="message message--currentUser">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente perferendis libero minima qui corrupti culpa consectetur incidunt. Velit, quaerat asperiores!
                </div>
                <div class="message message--currentUser">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente perferendis libero minima qui corrupti culpa consectetur incidunt. Velit, quaerat asperiores!
                </div>
                <div class="message--otherUser--first">
                    <img src="../../images/profilePhotos/userPhoto_2.png"/>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi expedita modi, ipsa consequuntur illo a. Ipsam, voluptates distinctio quae quibusdam debitis reiciendis iure quod adipisci quia inventore accusantium perspiciatis, sunt praesentium expedita. Consequuntur minus laborum velit mollitia libero repellat unde?</p>
                </div>
                <div class="message message--otherUser">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                </div>

                <div class="message message--otherUser">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                </div>
                <div class="message message--currentUser">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente perferendis libero minima qui corrupti culpa consectetur incidunt. Velit, quaerat asperiores!😂😂😂
                </div>
            </div>
            <div class="message__input__container">
                <i class="fa-solid fa-face-smile"></i>
                <i class="fa-solid fa-paper-plane"></i>
                <input type="text" class="message__input" placeholder="Your message here..."/>
            </div>
            
        </main>
    </section>

    <script src="../../js/loadTheme.js"></script>
    <script src="../../vendor/emojiPicker/vanillaEmojiPicker.js"></script>
    <script>
        new EmojiPicker({
        trigger: [
            {
            selector: '.fa-face-smile',
            insertInto: ['.message__input'] // '.selector' can be used without array
            },
        ],
        closeButton: true,
    });
    </script>
</body>
</html>