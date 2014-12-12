<?php

/*
  Plugin Name:  Register Theme Directory
  Plugin URI:   http://roots.io/wordpress-stack/
  Description:  Allow themes to be found from the old location in the wp-content dir
  Version:      1.0.0
  Author:       Roots
  Author URI:   http://roots.io/
  License:      MIT License
 */

if (!defined('ABSPATH'))
    exit('restricted access');

register_theme_directory(ABSPATH . 'wp-content/themes');
