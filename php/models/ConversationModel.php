<?php

require_once "Model.php";

class ConversationModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    public function getUserConversations($currentUserID)
    {
        $query = 'SELECT users.id,users.name,users.surname,conversation_id FROM user_conversations inner join users on user_conversations.user_id=users.id where user_conversations.user_id != :currentUserID and user_conversations.conversation_id=(SELECT user_conversations.conversation_id FROM user_conversations WHERE user_conversations.user_id = :currentUserID);';

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(':currentUserID',$currentUserID);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllConversationMessages()
    {

    }
    public function getLastMessage($conversationID)
    {
        $query = "SELECT messages.content,messages.upload_date FROM messages WHERE messages.conversation_id=:conversationID ORDER BY messages.id DESC LIMIT 1";

        $stmt = $this->prepareQuery($query);

        $stmt->bindParam(":conversationID",$conversationID);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>