<?php

/*
 * This file is part of the hyyan/gwp package.
 * (c) Hyyan Abo Fakher <tiribthea4hyyan@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Plugin Name: Hyyan Environment Name
 * Plugin URI: https://github.com/hyyan/gwp/
 * Description: The plugin will display the current environment in different places
 * Version: 1.0.0
 * Author: Hyyan Abo Fakher
 * Author URI: https://github.com/hyyan
 */
if (!defined('ABSPATH'))
    exit('restricted access');

/*
 * Check if the plugin must be activated
 */
if ((defined('SHOW_ENV_NAME') && SHOW_ENV_NAME) && (defined('WP_ENV'))) {
    add_action('init', 'env_name_setup');
    add_action('admin_bar_menu', 'env_name_add_to_admin_bar');
    add_filter('login_message', 'env_name_add_login_message');
}

/**
 * Add css style for the button
 */
function env_name_setup()
{
    if (is_admin_bar_showing()) {
        add_action('wp_head', 'env_name_print_style');
        add_action('admin_head', 'env_name_print_style');
    }
}

/**
 * print the button style
 */
function env_name_print_style()
{
    print "<style>"
            . "#wpadminbar .env-name-notification,"
            . "#wpadminbar .env-name-notification:hover,"
            . "#wpadminbar .env-name-notification a,"
            . "#wpadminbar .env-name-notification a:hover {"
            . "     background-color:#0074a2;"
            . "     color:white;"
            . "}"
            . "</style>";
}

/**
 * create our button
 * 
 * @param WP_Admin_Bar $admin_bar
 */
function env_name_add_to_admin_bar(WP_Admin_Bar $admin_bar)
{
    $env = ucwords(WP_ENV) . ' Environment';
    $admin_bar->add_menu(array(
        'id' => 'env-name',
        'parent' => 'top-secondary',
        'title' => apply_filters('env_name_menu_title', $env),
        'href' => '#',
        'meta' => array(
            'title' => sprintf('%s (%s)', $env, WP_HOSTNAME),
            'class' => 'env-name-notification'
        ),
    ));
}

/**
 * Add notification to the login screen
 */
function env_name_add_login_message()
{
    print "<p class='message' id='message'>"
            . apply_filters(
                    'env_name_login_message'
                    , sprintf(
                            '<strong>Note :</strong> You are using the <em style="border-bottom: thin dotted gray">%s environment</em>'
                            , ucwords(WP_ENV)
                    )
            )
            . "</p>";
}
