<?php

use Rax\EventManager\CoreEvent;

error_reporting(-1);
ini_set('display_errors', 1);

/**
 * The Rax PHP framework.
 *
 * @author  Gregorio Ramirez <goyocode@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

$container = require __DIR__.'/../etc/bootstrap/container.php';
$container->eventManager->trigger(CoreEvent::APP);
