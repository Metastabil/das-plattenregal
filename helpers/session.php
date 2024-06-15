<?php
/**
 * @author Julius Derigs <info@das-plattenregal.de>
 * @version 1.0
 */

if (!function_exists('redirect_if_not_authenticated')) {
    /**
     * @return void
     */
    function redirect_if_not_authenticated() :void {
        if (empty($_SESSION['user'])) {
            redirect(base_url('login'));
        }
    }
}

if (!function_exists('redirect_if_not_administrator')) {
    /**
     * @return void
     */
    function redirect_if_not_administrator() :void {
        if (!$_SESSION['user']['administrator']) {
            redirect(base_url('dashboard'));
        }
    }
}

if (!function_exists('is_administrator')) {
    /**
     * @return bool
     */
    function is_administrator() : bool {
        return $_SESSION['user']['administrator'];
    }
}

if (!function_exists('set_message')) {
    /**
     * @param string $type
     * @param string $message
     * @return void
     */
    function set_message(string $type, string $message) :void {
        $_SESSION['messages'] = [
            'type' => $type,
            'message' => $message
        ];
    }
}