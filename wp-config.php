<?php

if (!function_exists('project_env')) {
    function project_env(string $key, ?string $default = null): ?string
    {
        static $loaded = false;

        if (!$loaded) {
            $envFile = __DIR__ . '/.env';
            if (is_readable($envFile)) {
                $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($lines as $line) {
                    $line = trim($line);
                    if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) {
                        continue;
                    }

                    [$name, $value] = explode('=', $line, 2);
                    $name = trim($name);
                    $value = trim($value);

                    if (
                        (str_starts_with($value, '"') && str_ends_with($value, '"')) ||
                        (str_starts_with($value, "'") && str_ends_with($value, "'"))
                    ) {
                        $value = substr($value, 1, -1);
                    }

                    $_ENV[$name] = $value;
                    $_SERVER[$name] = $value;
                    putenv($name . '=' . $value);
                }
            }

            $loaded = true;
        }

        $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);
        return $value === false || $value === null || $value === '' ? $default : $value;
    }
}

define('DB_NAME', project_env('DB_NAME', 'wordpress'));
define('DB_USER', project_env('DB_USER', 'wordpress'));
define('DB_PASSWORD', project_env('DB_PASSWORD', 'wordpress'));
define('DB_HOST', project_env('DB_HOST', '127.0.0.1'));
define('DB_CHARSET', project_env('DB_CHARSET', 'utf8mb4'));
define('DB_COLLATE', project_env('DB_COLLATE', ''));

$table_prefix = project_env('DB_TABLE_PREFIX', 'wp_');

define('AUTH_KEY', project_env('AUTH_KEY', 'change-me'));
define('SECURE_AUTH_KEY', project_env('SECURE_AUTH_KEY', 'change-me'));
define('LOGGED_IN_KEY', project_env('LOGGED_IN_KEY', 'change-me'));
define('NONCE_KEY', project_env('NONCE_KEY', 'change-me'));
define('AUTH_SALT', project_env('AUTH_SALT', 'change-me'));
define('SECURE_AUTH_SALT', project_env('SECURE_AUTH_SALT', 'change-me'));
define('LOGGED_IN_SALT', project_env('LOGGED_IN_SALT', 'change-me'));
define('NONCE_SALT', project_env('NONCE_SALT', 'change-me'));

$wpHome = project_env('WP_HOME');
$wpSiteUrl = project_env('WP_SITEURL', $wpHome);

if ($wpHome) {
    define('WP_HOME', $wpHome);
}

if ($wpSiteUrl) {
    define('WP_SITEURL', $wpSiteUrl);
}

define('WP_DEBUG', filter_var(project_env('WP_DEBUG', 'false'), FILTER_VALIDATE_BOOLEAN));
define('WP_DEBUG_LOG', filter_var(project_env('WP_DEBUG_LOG', 'false'), FILTER_VALIDATE_BOOLEAN));
define('WP_DEBUG_DISPLAY', filter_var(project_env('WP_DEBUG_DISPLAY', 'false'), FILTER_VALIDATE_BOOLEAN));

define('FS_METHOD', 'direct');

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';
