<?php

/**
 * Classe de gestion des paramètres de configuration.
 * Inspirée du SimpleFramework de Frédéric Guillot
 * (https://github.com/fguillot/simpleFramework)
 *
 */
class Configuration
{
    /** Tableau des paramètres de configuration */
    private static $parameters;

    /**
     * Renvoie la valeur d'un paramètre de configuration
     * 
     * @param string $name Nom du paramètre
     * @param string $defaultValue Valeur à renvoyer par défaut
     * @return string Valeur du paramètre
     */
    public static function get($name, $defaultValue = null)
    {
        $parameters = self::getParameters();
        if (isset($parameters[$name])) {
            $value = $parameters[$name];
        }
        else {
            $value = $defaultValue;
        }
        return $value;
    }

    /**
     * Renvoie le tableau des paramètres en le chargeant au besoin depuis un fichier de configuration.
     * Les fichiers de configuration recherchés sont Config/dev.ini et Config/prod.ini (dans cet ordre)
     * 
     * @return array Tableau des paramètres
     * @throws Exception Si aucun fichier de configuration n'est trouvé
     */
    private static function getParameters()
    {
        if (self::$parameters == null) {
            $filePath = "Config/dev.ini";
            if (!file_exists($filePath)) {
                $filePath = "Config/prod.ini";
            }
            if (!file_exists($filePath)) {
                throw new Exception("Aucun fichier de configuration trouvé");
            }
            else {
                self::$parameters = parse_ini_file($filePath);
            }
        }
        return self::$parameters;
    }

}



