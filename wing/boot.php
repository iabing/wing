<?php
/**
 * 框架入口文件
 * @author dev 1115615218@qq.com
 */

/**
 * 框架
 */
define('WING', dirname(__FILE__));
define('WING_TIME', microtime(true));
define('WING_MEMORY', memory_get_usage(true));

/**
 * 核心
 */
require 'core/wings.php';
require 'core/control.php';

/**
 * 项目
 */
defined('APP') or define('APP', WING . '/app');
define('APP_CACHE', APP . '/cache');
define('APP_CONTROL', APP . '/control');
define('APP_MODEL', APP . '/model');
define('APP_TEMPLATE', APP . '/template');

/**
 * 启动
 */
boot();
if (!file_exists(APP . '/conf.php')) { $GLOBALS['config'] = require WING . '/conf.php'; } else { $GLOBALS['config'] = array_merge(require WING . '/conf.php', require APP . '/conf.php'); }
