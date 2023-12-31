<?php
function includePostTemplate($userID, $fullname, $postText,$postDate,$likesCount,$postID,$photosCount,$isLiked=false) {


    $profilePhotoURL = file_exists("../../images/profilePhotos/userPhoto_".$userID.".png")?
    "../../images/profilePhotos/userPhoto_".$userID.'.png':
    '../../images/profilePhotos/userPhoto_default.png';

    $likeBtn = $isLiked==false?
    '<div class="post__action like__btn" data-action="like"><i class="fa-solid fa-thumbs-up"></i>Like</div>':
    '<div class="post__action like__btn" data-action="dislike"><i class="fa-solid fa-thumbs-down"></i>Dislike</div>';

    $sliderHTML='';
    $pathToImages = "../../images/postPhotos/";
    for($i=0;$i<$photosCount;$i++)
    {
         $sliderHTML.=
           '<div class="slider__slide">
                <img class="slider__image" src="'.$pathToImages.'postPhoto--'.$postID.'_'.$i.'.png" alt="post image"/>
            </div>';   
    }

    $sliderBtns = $photosCount==1?'':'
        <div class="slider__button slider__next"><i class="fa-solid fa-chevron-right"></i></div>
        <div class="slider__button slider__prev"><i class="fa-solid fa-chevron-left"></i></div>';

    if($photosCount>0)
    {
        $sliderHTML = '
        <div class="slider__container">
            <div class="slider">'.
                $sliderHTML.
           '</div>'.$sliderBtns.'
        </div>';
    }


    $template = file_get_contents('../../templates/post_template.html');
    $template = str_replace('[[USER_ID]]', $userID, $template);
    $template = str_replace('[[FULLNAME]]', $fullname, $template);
    $template = str_replace('[[POST_TEXT]]', $postText, $template);
    $template = str_replace('[[POST_DATE]]', $postDate, $template);
    $template = str_replace('[[LIKES_COUNT]]', $likesCount, $template);
    $template = str_replace('[[POST_ID]]', $postID, $template);
    $template = str_replace('[[LIKE_BTN]]', $likeBtn, $template);
    $template = str_replace('[[PHOTO_URL]]', $profilePhotoURL, $template);
    $template = str_replace('[[SLIDER]]', $sliderHTML, $template);
   
    
    return $template;
}

?>