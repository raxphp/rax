<?php

/**
 * The Rax PHP framework.
 *
 * @author  Gregorio Ramirez <goyocode@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

define('ROOT_DIR',    dirname(dirname(__DIR__)).'/');
define('BUNDLE_DIR',  ROOT_DIR.'bundle/');
define('APP_DIR',     BUNDLE_DIR.'app/');
define('CORE_DIR',    BUNDLE_DIR.'core/');
define('ETC_DIR',     ROOT_DIR.'etc/');
define('STORAGE_DIR', ETC_DIR.'storage/');
define('CACHE_DIR',   STORAGE_DIR.'cache/');
define('LOG_DIR',     STORAGE_DIR.'log/');
define('UPLOAD_DIR',  STORAGE_DIR.'upload/');
define('VENDOR_DIR',  ROOT_DIR.'vendor/');
define('WEB_DIR',     ROOT_DIR.'web/');
