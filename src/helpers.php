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

    // If the base URL already has a subdomain, insert "admin." before it
    if (isset($parsedUrl['host'])) {
        // Split the host into parts
        $parts = explode('.', $parsedUrl['host']);

        // If there are already subdomains
        if (count($parts) > 2) {
            // Insert "admin." before the existing subdomain
            array_splice($parts, count($parts) - 2, 0, 'admin');
            $host = implode('.', $parts);
        } else {
            // Otherwise, prepend "admin." to the host
            $host = 'admin.' . $parsedUrl['host'];
        }
    } else {
        // If there's no host, set it to "admin"
        $host = 'admin';
    }

    // Rebuild the URL with the "admin" subdomain
    $scheme = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] . '://' : '';
    $port = isset($parsedUrl['port']) ? ':' . $parsedUrl['port'] : '';
    $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
    $query = isset($parsedUrl['query']) ? '?' . $parsedUrl['query'] : '';
    $fragment = isset($parsedUrl['fragment']) ? '#' . $parsedUrl['fragment'] : '';

    return $scheme . $host . $port . $path . $query . $fragment;
}
