<?php

/**
 * The Rax PHP framework.
 *
 * @author  Gregorio Ramirez <goyocode@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

use Rax\Bundle\Bundles;
use Rax\Bundle\Cfs;
use Rax\Bundle\Loader\DirBundleLoader;
use Rax\Container\Container;
use Rax\Data\Data;
use Rax\Data\Loader\FileLoader;
use Rax\Server\ServerMode;

define('RAX_START_TIME', microtime(true));
define('DS', DIRECTORY_SEPARATOR);

/**
 * Top level directory paths.
 */
require __DIR__.'/paths.php';

/**
 * Chicken or the egg?
 *
 * How do we autoload the autoloader? A: Composer.
 */
$classLoader = require VENDOR_DIR.'autoload.php';

/**
 * The server mode can be defined at the server level:
 *
 * - Apache: SetEnv ServerMode development
 * - Nginx:  fastcgi_param ServerMode development
 * - Shell:  export ServerMode=development
 */
$serverMode = new ServerMode($_SERVER['SERVER_MODE']);

$dirBundleLoader = new DirBundleLoader($serverMode);
$dirBundleLoader->setDir(APP_DIR.'config');
$dirBundleLoader->setBasename('bundles');

$bundles = new Bundles($dirBundleLoader->load());

$cfs = new Cfs($bundles, $serverMode);

$data = new Data();
$data->addLoader(new FileLoader('config', $cfs));

$container = new Container($data);
$container->set(array(
    'classLoader'     => $classLoader,
    'serverMode'      => $serverMode,
    'disBundleLoader' => $dirBundleLoader,
    'bundles'         => $bundles,
    'cfs'             => $cfs,
    'config'          => $data,
    'container'       => $container,
));
$container->loadLookup();
$container->autoload->consume($classLoader)->register();

return $container;
