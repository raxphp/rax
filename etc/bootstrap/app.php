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

require __DIR__.'/paths.php';

$classLoader = require VENDOR_DIR.'autoload.php';

$serverMode = new ServerMode($_SERVER['SERVER_MODE']);

$dirBundleLoader = new DirBundleLoader($serverMode);
$dirBundleLoader->setDir(APP_DIR.'config');
$dirBundleLoader->setBasename('bundles');

$bundles = new Bundles($dirBundleLoader->load());

$cfs = new Cfs($bundles, $serverMode);
$cfs->setInitBasename('bootstrap');

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
));
$container->autoload->register();
$container->cfs->loadBundles();

return $container->app;
