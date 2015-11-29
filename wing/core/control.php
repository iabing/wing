<?php
/**
 * Control Class
 * @author dev 1115615218@qq.com
 */

class Control {

  function __construct() {
  }

  function view($file = 'view', $var = array()) {
    extract($var);
    ob_end_clean();
    ob_start();
    load_template($file, $var);
    $content = ob_get_contents();
    ob_end_clean();
    ob_start();
    echo $content;
  }

}