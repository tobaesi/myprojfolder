<?php

require_once 'framework/Controller.php';
require_once 'model/Post.php';
require_once 'model/Comment.php';
/**
 * Contrôleur des actions liées aux billets
 *
 */
class ControllerPost extends Controller {

    private $post;
    private $comment;

    /**
     * Constructeur 
     */
    public function __construct() {
        $this->post = new Post();
        $this->comment = new Comment();
    }

    // Affiche les détails sur un billet
    public function index() {
        $idPost = $this->request->getParameter("id");
        
        $post = $this->post->getPost($idPost);
        $comments = $this->comment->getComments($idPost);
        
        $this->generateView(array('post' => $post, 'comments' => $comments));
    }

    // Ajoute un commentaire sur un billet
    public function comment() {
        $idPost = $this->request->getParameter("id");
        $autor = $this->request->getParameter("autor");
        $content = $this->request->getParameter("content");
        
        $this->comment->addComment($autor, $content, $idPost);
        
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executeAction("index");
    }
}

