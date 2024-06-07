<?php
/**
 * @author Julius Derigs <derigs@kutzner-beratung.com>
 * @version 1.0
 */

if (!function_exists('get_language')) {
    /**
     * @param string $locale
     * @return array
     */
    function get_language(string $locale = 'de') :array {
        $filepath = dirname(__DIR__, 2) . '/languages/' . $locale . '.php';

        if (!is_file($filepath)) {
            if (ENVIRONMENT === 'development') {
                die('Missing file: ' . $filepath);
            }

            redirect('404');
        }

        require_once $filepath;

        /**
         * @var array $lang
         */
        return $lang;
    }
}