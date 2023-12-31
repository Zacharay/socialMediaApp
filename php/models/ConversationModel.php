<?php

require_once "Model.php";

class ConversationModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    public function getUserConversations($currentUserID)
    {
        $query = 'SELECT users.id,users.name,users.surname,conversation_id FROM user_conversations inner join users on user_conversations.user_id=users.id where user_conversations.user_id != :currentUserID and user_conversations.conversation_id in (SELECT user_conversations.conversation_id FROM user_conversations WHERE user_conversations.user_id = :currentUserID);';

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(':currentUserID',$currentUserID);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllConversationMessages($conversationID)
    {
        $query ="SELECT messages.content,messages.upload_date,messages.sender_id FROM messages where messages.conversation_id = :conversationID";

        $stmt = $this->prepareQuery($query);

        $stmt->bindParam(":conversationID",$conversationID);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getLastMessage($conversationID)
    {
        $query = "SELECT messages.content,messages.upload_date FROM messages WHERE messages.conversation_id=:conversationID ORDER BY messages.id DESC LIMIT 1";

        $stmt = $this->prepareQuery($query);

        $stmt->bindParam(":conversationID",$conversationID);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function sendMessage($content,$conversationID,$senderID)
    {
        $query = 'INSERT INTO messages VALUES(NULL,:content,CURRENT_TIMESTAMP,:conversationID,:senderID)';
        $stmt = $this->prepareQuery($query);

        $stmt->bindParam(":content",$content);
        $stmt->bindParam(":conversationID",$conversationID);
        $stmt->bindParam(":senderID",$senderID);
        $stmt->execute();
    }
    public function getConversationTitle($conversationID)
    {
        $query = "SELECT CONCAT(users.name,' ',users.surname) as fullname,users.id from users inner join user_conversations on user_conversations.user_id = users.id WHERE user_conversations.conversation_id = :conversationID";

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(":conversationID",$conversationID);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createConversation($receiverID,$currentUserID)
    {
        $query = "INSERT INTO conversations values(null);";
        $stmt = $this->prepareQuery($query);
        $stmt->execute();

        $conversationID = $this->getLastInsertId();
        $query = "INSERT INTO user_conversations VALUES(null,:receiverID,:conversationID),(null,:currentUserID,:conversationID)";
        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(":receiverID",$receiverID);
        $stmt->bindParam(":currentUserID",$currentUserID);
        $stmt->bindParam(":conversationID",$conversationID);
        $stmt->execute();

        return $conversationID;
    }
    public function doesConversationExists($userID,$receiverID)
    {
        $query = "SELECT conversations.id FROM user_conversations inner join conversations on user_conversations.conversation_id = conversations.id WHERE user_conversations.user_id = :receiverID and user_conversations.conversation_id in(SELECT conversation_id FROM user_conversations INNER JOIN conversations ON user_conversations.conversation_id=conversations.id WHERE user_conversations.user_id = :userID)";

        $stmt = $this->prepareQuery($query);
        $stmt->bindParam(":receiverID",$receiverID);
        $stmt->bindParam(":userID",$userID);

        $stmt->execute();

        $result =$stmt->fetch(PDO::FETCH_ASSOC);
 
      

        return $result['id'];
    }
}
?>