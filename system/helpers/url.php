<?php
use JetBrains\PhpStorm\NoReturn;

/**
 * @author Julius Derigs <derigs@kutzner-beratung.com>
 * @version 1.0
 */

if (!function_exists('base_url')) {
    /**
     * @param string $uri
     * @return string
     */
    function base_url(string $uri = '') :string {
        return BASE_URL . $uri;
    }
}

if (!function_exists('redirect')) {
    /**
     * @param string $url
     * @return void
     */
    #[NoReturn] function redirect(string $url) :void {
        header('Location: ' . $url);
        exit;
    }
}

if (!function_exists('router')) {
    /**
     * @param string $route
     * @param mixed $callback
     * @return bool
     */
    function router(string $route, mixed $callback) :bool {
        $url_parts = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $requested_route = implode('/', $url_parts);
        $route_regex = preg_replace('/:[^\/]+/', '([^\/]+)', $route);

        if (preg_match("~^$route_regex$~", $requested_route, $matches)) {
            call_user_func_array($callback, array_slice($matches, 1));
            return true;
        }

        return false;
    }
}