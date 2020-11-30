<?php

require_once 'framework/Model.php';

/**
 * Fournit les services d'accès aux billets du blog 
 * 
 */
class Post extends Model {

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getPosts() {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as title, BIL_CONTENU as content from T_BILLET'
                . ' order by BIL_ID desc';
        $posts = $this->executeRequest($sql);
        return $posts;
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getPost($idPost) {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as title, BIL_CONTENU as content from T_BILLET'
                . ' where BIL_ID=?';
        $post = $this->executeRequest($sql, array($idPost));
        if ($post->rowCount() > 0)
            return $post->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idPost'");
    }

    /**
     * Renvoie le nombre total de billets
     * 
     * @return int Le nombre de billets
     */
    public function getNumberPosts()
    {
        $sql = 'select count(*) as nbPosts from T_BILLET';
        $result = $this->executeRequest($sql);
        $line = $result->fetch();  // Le résultat comporte toujours 1 ligne
        return $line['nbPosts'];
    }
}