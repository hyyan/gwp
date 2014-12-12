<?php

/*
 * This file is part of the hyyan/gwp package.
 * (c) Hyyan Abo Fakher <tiribthea4hyyan@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Full path for root dir 
 */
define('GWP_ROOT', dirname(__DIR__));

/**
 * Full path for web dir 
 */
define('GWP_WEB', GWP_ROOT . '/web');

/**
 * Let composer handle auto loading
 */
require_once(GWP_ROOT . '/vendor/autoload.php');

/*
 * Detect the current environment 
 * Set up our global environment constants and load its config first
 * Use Dotenv to set required environment variables and load .env file in root
 */
$environments = require_once(__DIR__ . '/environment.php');
$hostname = gethostname();
foreach ($environments as $env => $name) {
    if ($hostname === $name) {
        define('WP_ENVS', serialize($environments));
        define('WP_ENV', $env);
        define('WP_HOSTNAME', $hostname);
        break;
    }
}

unset($environments, $hostname);
Dotenv::load(GWP_ROOT, '.env.' . WP_ENV);
Dotenv::required(array(
    'DB_NAME'
    , 'DB_USER'
    , 'DB_PASSWORD'
    , 'WP_HOME'
    , 'WP_HOME_PLAIN'
    , 'WP_SITEURL'
    , 'WP_SITEURL_PLAIN'
));


// Database
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost');

// WordPress URLs
define('WP_HOME', getenv('WP_HOME'));
define('WP_SITEURL', getenv('WP_SITEURL'));

// Custom Content Directory
define('CONTENT_DIR', '/app');
define('WP_CONTENT_DIR', GWP_WEB . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

// load additional config for the current env
$env_config = __DIR__ . '/environments/' . WP_ENV . '.php';
if (file_exists($env_config))
    require_once $env_config;
unset($env_config);

/**
 * Get shared config
 */
require_once __DIR__ . '/shared.php';

/**
 * Bootstrap WordPress
 */
if (!defined('ABSPATH')) {
    define('ABSPATH', GWP_WEB . '/cms/');
}
