<?php
function includePostTemplate($userid, $fullname, $postText,$postDate,$likesCount) {
    $template = file_get_contents('../../templates/post_template.html');
    $template = str_replace('[[USER_ID]]', $userid, $template);
    $template = str_replace('[[FULLNAME]]', $fullname, $template);
    $template = str_replace('[[POST_TEXT]]', $postText, $template);
    $template = str_replace('[[POST_DATE]]', $postDate, $template);
    $template = str_replace('[[LIKES_COUNT]]', $likesCount, $template);
    return $template;
}

?>