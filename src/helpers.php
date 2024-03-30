<?php

/**
 * Generate admin subdomain URL based on the given base URL.
 *
 * @param  string  $baseUrl
 * @return string
 */
function adminUrl($baseUrl = '')
{
    $parsedUrl = parse_url(url($baseUrl));

    if (isset($parsedUrl['host'])) {
        $parts = explode('.', $parsedUrl['host']);

        if (count($parts) > 2) {
            array_splice($parts, count($parts) - 2, 0, 'admin');
            $host = implode('.', $parts);
        } else {
            $host = 'admin.' . $parsedUrl['host'];
        }
    } else {
        $host = 'admin';
    }

    $scheme = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] . '://' : '';
    $port = isset($parsedUrl['port']) ? ':' . $parsedUrl['port'] : '';
    $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
    $query = isset($parsedUrl['query']) ? '?' . $parsedUrl['query'] : '';
    $fragment = isset($parsedUrl['fragment']) ? '#' . $parsedUrl['fragment'] : '';

    return $scheme . $host . $port . $path . $query . $fragment;
}
