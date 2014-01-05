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
use Rax\Config\Config;
use Rax\Config\Loader\FileLoader;
use Rax\Server\ServerMode;

define('RAX_START_TIME', microtime(true));
define('DS', DIRECTORY_SEPARATOR);

/**
 * Top level directory paths.
 */
require __DIR__.'/path.php';

/**
 * Which came first, the chicken or the egg?
 *
 * We use Composer to autoload the autoloader.
 */
$classLoader = require VENDOR_DIR.'autoload.php';

/**
 * The server mode can be defined at the server level:
 *
 * - Apache: SetEnv SERVER_MODE development
 * - Nginx:  fastcgi_param SERVER_MODE development
 * - Shell:  export SERVER_MODE=development
 */
$serverMode = new ServerMode($_SERVER['SERVER_MODE']);

$dirBundleLoader = new DirBundleLoader($serverMode);
$dirBundleLoader->setDir(APP_DIR.'config');
$dirBundleLoader->setBasename('bundle');

$bundles = new Bundles($dirBundleLoader->load());

$cfs = new Cfs($bundles, $serverMode);

$config = new Config();
$config->addLoader(new FileLoader('config', $cfs));

$container = new Container($config);
$container->set(array(
    'classLoader'     => $classLoader,
    'serverMode'      => $serverMode,
    'disBundleLoader' => $dirBundleLoader,
    'bundles'         => $bundles,
    'cfs'             => $cfs,
    'config'          => $config,
    'container'       => $container,
));
$container->loadLookup();
$container->autoload->consume($classLoader)->register();

return $container;
