<?php

/*
  Plugin Name:  Register Theme Directory
  Plugin URI:   http://roots.io/wordpress-stack/
  Description:  Allow theme to be found from the old location in the wp-content
  Version:      1.0.0
  Author:       Roots
  Author URI:   http://roots.io/
  License:      MIT License
 */
register_theme_directory(ABSPATH . 'wp-content/themes');
