<?php

require_once 'ControllerSecured.php';
require_once 'model/Post.php';
require_once 'model/Comment.php';

/**
 * Contrôleur des actions d'administration
 * 
 */
class ControllerAdmin extends ControllerSecured
{
    private $post;
    private $comment;

    /**
     * Constructeur 
     */
    public function __construct()
    {
        $this->post = new Post();
        $this->comment = new Comment();
    }

    public function index()
    {
        $nbPosts = $this->post->getNumberPosts();
        $nbComments = $this->comment->getNumberComments();
        $login = $this->request->getSession()->getAttribute("login");
        parent::generateView(array('nbPosts' => $nbPosts, 'nbComments' => $nbComments, 'login' => $login));
    }

}

