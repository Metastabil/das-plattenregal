<?php
/**
 * @author Julius Derigs <derigs@kutzner-beratung.com>
 * @version 1.0
 */

if (!function_exists('get_http_response_code')) {
    /**
     * @see	https://www.php.net/manual/en/function.get-headers.php
     * @param string $url
     * @return string
     */
    function get_http_response_code(string $url) :string {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
}
