<?php

error_reporting(-1);
ini_set('display_errors', 1);

/**
 * The Rax PHP framework.
 *
 * @author  Gregorio Ramirez <goyocode@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

$app = require __DIR__.'/../etc/bootstrap/app.php';
$app->run();
