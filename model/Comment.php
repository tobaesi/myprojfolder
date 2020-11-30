<?php

require_once 'framework/Model.php';

/**
 * Fournit les services d'accès aux commentaires 
 * 
 */
class Comment extends Model {

// Renvoie la liste des commentaires associés à un billet
    public function getComments($idPost) {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as autor, COM_CONTENU as content from T_COMMENTAIRE'
                . ' where BIL_ID=?';
        $comments = $this->executeRequest($sql, array($idPost));
        return $comments;
    }

    public function addComment($autor, $content, $idPost) {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(?, ?, ?, ?)';
        $date = date(DATE_W3C);
        $this->executeRequest($sql, array($date, $autor, $content, $idPost));
    }
    
    /**
     * Renvoie le nombre total de commentaires
     * 
     * @return int Le nombre de commentaires
     */
    public function getNumberComments()
    {
        $sql = 'select count(*) as nbComments from T_COMMENTAIRE';
        $result = $this->executeRequest($sql);
        $line = $result->fetch();  // Le résultat comporte toujours 1 ligne
        return $line['nbComments'];
    }
}