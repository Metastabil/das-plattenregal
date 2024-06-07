<?php
namespace KPO\System\Classes;

/**
 * @author Julius Derigs <derigs@kutzner-beratung.com>
 * @version 1.0
 */

class View {
    /**
     * @param string $view
     * @param array $params
     * @return $this
     */
    public function render(string $view, array $params = []): View {
        $viewDirectory = dirname(__DIR__, 2) . '/views';

        if (is_file("$viewDirectory/$view.php")) {
            $viewPath = "$viewDirectory/$view.php";
        }
        else {
            $viewPath = "$viewDirectory/errors/404.php";
        }

        extract($params);

        ob_start();

        include $viewPath;

        echo  ob_get_clean();

        return $this;
    }
}