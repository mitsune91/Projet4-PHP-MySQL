<?php
require_once("model/Manager.php"); // On oubli pas d'indiquer l'emplacement de la classe parente
class CommentManager extends Manager
{
    //fonction de la classe
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
    public function getAllComments()
    {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT id, post_id, author, comment, status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments  ORDER BY status DESC, comment_date_fr DESC');
        return $comments;
    }

    public function warnedCom($comId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comments SET status="status" WHERE id='.$comId);
        $affectedLines = $comment->execute(array($comId));
        return $affectedLines;

    }
   public function getComment($comId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, status FROM comments WHERE id = ?');
        $req->execute(array($comId));
        $comment = $req->fetch();

        return $comment;
    }
     public function getPostByComment($comId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post_id FROM comments WHERE id = ?');
        $req->execute(array($comId));
        $postId = $req->fetch();

        return $postId;
    }

    public function commentEdit($id, $author, $comment, $status)
    {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE comments SET id = ?, author = ?, comment = ?, status = ? WHERE id ='.$id);
    $affectedLines = $req->execute(array($id, $author, $comment, $status));

    return $affectedLines;
    }

    public function commentDelete($comId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare("DELETE FROM comments WHERE id=".$comId);
        $affectedLines = $comment->execute(array($comId));
        return $affectedLines;
    }


}
