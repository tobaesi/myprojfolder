<?php

require_once 'Configuration.php';
require_once 'Request.php';
require_once 'View.php';

/**
 * Classe abstraite contrôleur. 
 * Fournit des services communs aux classes contrôleurs dérivées.
 * 
 */
abstract class Controller
{
    /** Action à réaliser */
    private $action;

    /** Requête entrante */
    protected $request;

    /**
     * Définit la requête entrante
     * 
     * @param Request $request Request entrante
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Exécute l'action à réaliser.
     * Appelle la méthode portant le même nom que l'action sur l'objet Controller courant
     * 
     * @throws Exception Si l'action n'existe pas dans la classe Controller courante
     */
    public function executeAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $classController = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $classController");
        }
    }

    /**
     * Méthode abstraite correspondant à l'action par défaut
     * Oblige les classes dérivées à implémenter cette action par défaut
     */
    public abstract function index();

    /**
     * Génère la vue associée au contrôleur courant
     * 
     * @param array $datasView Données nécessaires pour la génération de la vue
     * @param string $action Action associée à la vue (permet à un contrôleur de générer une vue pour une action spécifique)
     */
    protected function generateView($datasView = array(), $action = null)
    {
        // Utilisation de l'action actuelle par défaut
        $actionView = $this->action;
        if ($action != null) {
            // Utilisation de l'action passée en paramètre
            $actionView = $action;
        }
        // Utilisation du nom du contrôleur actuel
        $classController = get_class($this);
        $controllerView = str_replace("Controller", "", $classController);

        // Instanciation et génération de la vue
        $view = new View($actionView, $controllerView);
        $view->generate($datasView);
    }

    /**
     * Effectue une redirection vers un contrôleur et une action spécifiques
     * 
     * @param string $controller Contrôleur
     * @param type $action Action Action
     */
    protected function redirect($controller, $action = null)
    {
        $webRoot = Configuration::get("webRoot", "/");
        // Redirection vers l'URL /racine_site/controller/action
        header("Location:" . $webRoot . $controller . "/" . $action);
    }

}
