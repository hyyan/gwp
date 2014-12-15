<?php

/*
 * This file is part of the hyyan/gwp package.
 * (c) Hyyan Abo Fakher <tiribthea4hyyan@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gwp;

use Composer\Script\Event;

/**
 * Create Project Script
 *
 * @author Hyyan 
 */
class Create
{

    /**
     * Generate salt keys
     * 
     * @param Event $event
     * @return int
     */
    public static function generateSalts(Event $event)
    {
        $root = dirname(dirname(__DIR__));
        $composer = $event->getComposer();
        $io = $event->getIO();

        if (!$io->isInteractive()) {
            $generate_salts = $composer->getConfig()->get('generate-salts');
        } else {
            $generate_salts = $io->askConfirmation(
                    '<info>Do you want to generate fresh salt keys ? (Note that this action will override your shared.php config file inside the config dir)'
                    . '</info> [<comment>Y,n</comment>]? '
                    , true
            );
        }

        if (!$generate_salts) {
            return 1;
        }

        $service = 'https://api.wordpress.org/secret-key/1.1/salt/';
        $salts = @file_get_contents($service);
        if (!$salts) {
            $io->write("<error>"
                    . "An error occurred while trying to generate the salts keys,"
                    . "Please try to generate the salt keys manually from the following url : \"" . $service
                    . "\" Then copy and paste the result to your shared.php config file inside the config dir."
                    . "</error>");
            return 1;
        }
        $content = static::applyTemplate(__DIR__ . '/templates/shared.php.tpl', array(
                    'saltKeys' => $salts
        ));
        if (!@file_put_contents($root . '/config/shared.php', $content)) {
            $io->write("<error>"
                    . "An error occurred while trying to write the salts keys,"
                    . "copy and paste the following line to your shared.php config file inside the config dir."
                    . "\n\n"
                    . "</error>"
                    . $salts
            );
            return 1;
        }
    }

    /**
     * Execute a PHP template file and return the result as a string.
     * 
     * @param string $template
     * @param array $vars
     * @param boolean $includeGlobals
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

        require($template);

        $applied_template = ob_get_contents();
        ob_end_clean();

        return $applied_template;
    }

}
