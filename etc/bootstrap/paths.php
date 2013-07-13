<?php

/**
 * Rax PHP Framework.
 *
 * @author  Gregorio Ramirez <goyocode@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 */

define('RAX_START_TIME', microtime(true));
define('DS', DIRECTORY_SEPARATOR);

/**
 * Top level directory paths.
 */
define('ROOT_DIR',    dirname(dirname(__DIR__)).'/');
define('BUNDLES_DIR', ROOT_DIR.'bundles/');
define('APP_DIR',     BUNDLES_DIR.'app/');
define('RAX_DIR',     BUNDLES_DIR.'rax/');
define('ETC_DIR',     ROOT_DIR.'etc/');
define('STORAGE_DIR', ETC_DIR.'storage/');
define('CACHE_DIR',   STORAGE_DIR.'cache/');
define('LOGS_DIR',    STORAGE_DIR.'logs/');
define('UPLOADS_DIR', STORAGE_DIR.'uploads/');
define('VENDOR_DIR',  ROOT_DIR.'vendor/');
define('WEB_DIR',     ROOT_DIR.'web/');
