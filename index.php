<?php

// Contrôleur frontal : instancie un router pour traiter la requête entrante

require 'framework/Router.php';

$router = new Router();
$router->routerRequest();


