<?php
/**
 * @author Julius Derigs <info@das-plattenregal.de>
 * @version 1.0
 */

if (!function_exists('split_by_space')) {
    /**
     * @param string $string
     * @return array
     */
    function split_by_space(string $string) :array {
        return preg_split('/\s+/', $string);
    }
}