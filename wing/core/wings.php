<?php
/**
 * Wings
 * @author dev 1115615218@qq.com
 */

/**
 * Wing boot
 */
function boot() {
  if (!file_exists(APP . '/locker.php')) {
    is_dir(APP) or mkdir(APP) or die("Can't create APP folder.");
    is_dir(APP_CACHE) or mkdir(APP_CACHE) or die("Can't create CACHE folder.");
    is_dir(APP_CONTROL) or mkdir(APP_CONTROL) or die("Can't create CONTROL folder.");
    is_dir(APP_MODEL) or mkdir(APP_MODEL) or die("Can't create MODEL folder.");
    is_dir(APP . '/template/m') or mkdir(APP . '/template/m', 0777, true) or die("Can't create TEMPLATE/m folder.");
    is_dir(APP . '/template/w') or mkdir(APP . '/template/w', 0777, true) or die("Can't create TEMPLATE/w folder.");
    file_exists(APP_CONTROL . '/home.php') or file_put_contents(APP_CONTROL . '/home.php', "<?php\nclass Home extends Control {\n  function index() {\n    echo '<title>!</title><body>home page.</body>';\n  }\n}");
    file_exists(APP . '/conf.php') or file_put_contents(APP . '/conf.php', "<?php\nreturn array();");
    file_exists(APP . '/locker.php') or file_put_contents(APP . '/locker.php', '1');
  }
  is_writeable(APP_CACHE) or mkdir(APP_CACHE) or die("CACHE folder can't write.");
  !file_exists(APP . '/conf.php') or is_array(require APP . '/conf.php') or die('conf.php must return array.');
}

/**
 * Wing loader
 */
function loader() {
  $_SERVER['REQUEST_URI'] = strtolower($_SERVER['REQUEST_URI']);
  if (preg_match('/.php/', $_SERVER['REQUEST_URI'])) {
    $GLOBALS['request'] = mb_substr($_SERVER['REQUEST_URI'], stripos($_SERVER['REQUEST_URI'], '.php') + 4);
  } else {
    $GLOBALS['request'] = $_SERVER['REQUEST_URI'];
  }
  $GLOBALS['request'] = explode('/', $GLOBALS['request']);
  if (@!$GLOBALS['request'][1]) { $GLOBALS['request'][1] = 'home'; }
  if (@!$GLOBALS['request'][2]) { $GLOBALS['request'][2] = '_'; }
  if (@!$GLOBALS['request'][3]) { $GLOBALS['request'][3] = '0'; }
  file_exists(APP_CONTROL . "/{$GLOBALS['request'][1]}.php") or error_404("Control {$GLOBALS['request'][1]} not exists.");
  require APP_CONTROL . "/{$GLOBALS['request'][1]}.php";
  $GLOBALS['request'][1] = ucfirst($GLOBALS['request'][1]);
  $control = new $GLOBALS['request'][1];
  if (method_exists($control, $GLOBALS['request'][2])) {
    $control->$GLOBALS['request'][2]($GLOBALS['request'][3]);
  } else {
    method_exists($control, '__') or die("Method {$GLOBALS['request'][2]} not exists.");
    $control->__($GLOBALS['request'][2]);
  }
}

/**
 * 404
 * @param string $string
 */
function error_404($string) {
  if (file_exists(APP_TEMPLATE . '/m/404.php') || file_exists(APP_TEMPLATE . '/w/404.php')) {
    load_template('404'); exit;
  } else { die("<title>error</title><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no'><body>$string</body>"); }
}

/**
 * 重定向
 * @param $url
 */
function redirect($url) {
  header("location: $url"); exit;
}

/**
 * 加载插件
 * @param string $file
 */
function load_plugin($file = 'plugin') {
  file_exists(WING . "/plugin/$file.php") or die("Plugin $file not exists.");
  require_once WING . "/plugin/$file.php";
}

/**
 * 加载模板
 * @param string $file
 */
function load_template($file = 'template', $var = array()) {
  extract($var);
  if (is_mobile()) {
    if (file_exists(APP_TEMPLATE . "/m/$file.php")) {
      require APP_TEMPLATE . "/m/$file.php";
    } else if (file_exists(APP_TEMPLATE . "/w/$file.php")) {
      require APP_TEMPLATE . "/w/$file.php";
    } else {
      die("Template $file not exists.");
    }
  } else {
    if (file_exists(APP_TEMPLATE . "/w/$file.php")) {
      require APP_TEMPLATE . "/w/$file.php";
    } else if (file_exists(APP_TEMPLATE . "/m/$file.php")) {
      require APP_TEMPLATE . "/m/$file.php";
    } else {
      die("Template $file not exists.");
    }
  }
}

/**
 * 移动设备
 * @return bool
 */
function is_mobile() {
  if (preg_match('/mobile/', strtolower($_SERVER['HTTP_USER_AGENT']))) { return true; }
  return false;
}

/**
 * 内存消耗
 */
function used_memory() {
  return format_bytes(memory_get_usage(true) - WING_MEMORY);
}

/**
 * 格式化bytes
 * @param int $bytes
 * @return string
 */
function format_bytes($bytes = 1) {
  if ($bytes < 1024) { return $bytes . ' B'; }
  if ($bytes < 1048576) { return round($bytes / 1024, 2) . ' KB'; }
  if ($bytes < 1073741824) { return round($bytes / 1048576, 2) . ' MB'; }
  if ($bytes < 1099511627776) { return round($bytes / 1073741824, 2) . ' GB'; }
  if ($bytes < 1125899906842624) { return round($bytes / 1099511627776, 2) . ' TB'; }
  return round($bytes / 1125899906842624, 2) . ' PB';
}

/**
 * 时间消耗
 */
function used_time() {
  return format_ms((microtime(true) - WING_TIME) * 1000);
}

/**
 * 格式化ms
 * @param int $ms
 * @return string
 */
function format_ms($ms = 1) {
  if ($ms < 1000) { return (int)$ms . ' ms'; }
  return round($ms / 1000, 2) . ' s';
}