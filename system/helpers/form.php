<?php
/**
 * @author Julius Derigs <derigs@kutzner-beratung.com>
 * @version 1.0
 */

if (!function_exists('form_input')) {
    /**
     * @param array $params
     * @param string|null $value
     * @return string
     */
    function form_input(array $params, string|null $value = '') :string {
        $html = "<input ";

        foreach ($params as $key => $val) {
            $html .= "$key=\"$val\" ";
        }

        $html .= " value=\"$value\" />";

        return $html;
    }
}

if (!function_exists('is_post')) {
    /**
     * @return bool
     */
    function is_post() :bool {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}

if (!function_exists('is_get')) {
    /**
     * @return bool
     */
    function is_get() :bool {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
}

if (!function_exists('get_input')) {
    /**
     * @param string $name
     * @param string $method
     * @return string
     */
    function get_input(string $name, string $method = 'POST') :string {
        if ($method === 'POST') {
            return (string)$_POST[$name];
        }

        return (string)$_GET[$name];
    }
}

if (!function_exists('check_for_required_fields')) {
    /**
     * @param array $fields
     * @param string $method
     * @return bool
     */
    function check_for_required_fields(array $fields, string $method = 'POST') :bool {
        $present = true;

        if ($method === 'POST') {
            foreach ($fields as $field) {
                if (empty($_POST[$field])) {
                    $present = false;
                }
            }
        }

        if ($method === 'GET') {
            foreach ($fields as $field) {
                if (empty($_GET[$field])) {
                    $present = false;
                }
            }
        }

        return $present;
    }
}