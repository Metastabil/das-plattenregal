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

if (!function_exists('set_message')) {
    function set_message(string $type, string $message) :void {
        $_SESSION['messages'] = [
            'type' => $type,
            'message' => $message
        ];
    }
}