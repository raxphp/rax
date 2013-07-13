<?php

/**
 * Rax PHP Framework.
 *
 * @author  Gregorio Ramirez <goyocode@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

require __DIR__.'/../etc/bootstrap/paths.php';
require __DIR__.'/../etc/bootstrap/bootstrap.php.cache';
require __DIR__.'/../vendor/composer/autoload.php';

$app = new App(new ServerMode($_SERVER['SERVER_MODE']));
$app->run();
