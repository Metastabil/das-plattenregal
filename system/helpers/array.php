<?php
/**
 * @author Julius Derigs <derigs@kutzner-beratung.com>
 * @version 1.0
 */

if (!function_exists('array_to_json')) {
    /**
     * @param array $array
     * @return string
     */
    function array_to_json(array $array) :string {
        try {
            return json_encode($array, JSON_THROW_ON_ERROR);
        }
        catch (JsonException $exception) {
            if (ENVIRONMENT === 'development') {
                die($exception->getMessage());
            }

            redirect('404');
        }
    }
}