<?php
/**
 * @author Julius Derigs <derigs@kutzner-beratung.com>
 * @version 1.0
 */

if (!function_exists('esc')) {
    /**
     * @param string $string
     * @return string
     */
    function esc(string $string) :string {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('format_timestamp')) {
    /**
     * @param string $timestamp
     * @param string $format
     * @return string
     */
    function format_timestamp(string $timestamp, string $format = 'd.m.Y') :string {
        try {
            $date = new DateTime($timestamp);
        }
        catch (Exception $exception) {
            if (ENVIRONMENT === 'development') {
                die($exception->getMessage());
            }

            redirect('404');
        }

        return $date->format($format);
    }
}