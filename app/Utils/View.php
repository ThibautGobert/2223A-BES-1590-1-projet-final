<?php

namespace App\Utils;

class View
{
    /**
     *
     * Méthode statique de la classe View qui peut être appellée sans instancier la classe
     * => pas besoin de faire new View() pour accéder à la méthode
     * => on utiliser la méthode render de cette manière : View::render();
     * @param $viewName
     * @param $layout
     * @param array $data
     * @return void
     */
    public static function render(string $viewName, string $layout = 'main', array $data = []) {
        ob_start();

        extract($data);

        require __DIR__.'/../../views/'. $viewName .'.php';

        $contenu = ob_get_clean();
        require __DIR__.'/../../views/layout/'.$layout.'.php';
        /**
         * On réinitialise la session pour effacer les messages d'erreur
         */
        session_destroy();
    }
}