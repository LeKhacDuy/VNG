<?php

$rootPath   = dirname(__FILE__);
$scriptPath = DIRECTORY_SEPARATOR . trim($_SERVER['SCRIPT_FILENAME'], DIRECTORY_SEPARATOR);
$requestUri = DIRECTORY_SEPARATOR . ltrim($_SERVER['REQUEST_URI'], DIRECTORY_SEPARATOR);

// Response 404 if script file not exists
if (!file_exists($scriptPath) || in_array($scriptPath, [__FILE__, DIRECTORY_SEPARATOR . 'router.php'])) {
    header('HTTP/1.0 404 Not Found', true, 404);
    exit();
}

// Request uri must end with the character "/"
if (is_dir($rootPath . DIRECTORY_SEPARATOR . $requestUri) && !str_ends_with($requestUri, '/')) {
    header('Location: ' . $requestUri . '/', true, 301);
    exit();
}

// Protect folders
foreach (['/wp-includes', '/wp-content/plugins', '/database'] as $subPath) {
    if (str_starts_with(
        trim($requestUri, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR,
        trim($subPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR
    ) && preg_match('/\.(php|sql)$/', $requestUri)) {
        header('HTTP/1.0 403 Forbidden', true, 403);
        exit();
    }
}

// Return load file
return false;