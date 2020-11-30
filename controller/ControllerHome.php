<?php

require_once 'framework/Controller.php';
require_once 'model/Post.php';

class ControllerHome extends Controller {

    private $post;

    public function __construct() {
        $this->post = new Post();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $posts = $this->post->getPosts();
        $this->generateView(array('posts' => $posts));
    }

}



