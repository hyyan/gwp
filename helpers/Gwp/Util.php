<?php

/*
 * This file is part of the hyyan/gwp package.
 * (c) Hyyan Abo Fakher <tiribthea4hyyan@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gwp;

/**
 * Utils
 *
 * @author Hyyan
 */
final class Util
{

    /**
     * Execute a PHP template file and return the result as a string.
     * 
     * @param string $template path to template file
     * @param array $vars array of vars to extract
     * @param boolean $includeGlobals true to include global array
     * 
     * @return string
     */
    public static function applyTemplate($template, array $vars = array(), $includeGlobals = true)
    {
        extract($vars);

        if ($includeGlobals) {
            extract($GLOBALS, EXTR_SKIP);
        }

        ob_start();

        include(static::getViewsPath() . '/' . $template);

        $applied_template = ob_get_contents();
        ob_end_clean();

        return $applied_template;
    }

    /**
     * Get gwp root dir
     * 
     * @return string
     */
    public static function getGwpPath()
    {
        return __DIR__;
    }

    /**
     * Get resources dir
     * 
     * @return string
     */
    public static function getResourcesPath()
    {
        return static::getGwpPath() . '/Resources';
    }

    /**
     * Get views path
     * 
     * @return string
     */
    public static function getViewsPath()
    {
        return static::getResourcesPath() . '/Views';
    }

}
