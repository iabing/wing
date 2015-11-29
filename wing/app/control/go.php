<?php
class Go extends Control {
  function _() {
    echo 'go func';
  }
  function __($_) {
    switch ($_) {
      case '1':
        redirect('http://126258.cliim.cn/MctyOR'); break;
      case '2':
        redirect('http://126258.cliim.cn/MiuyWY'); break;
      case '3':
        redirect('http://126258.cliim.cn/M1zBEX'); break;
      case '4':
        redirect('http://v.2w.ma/BBIVX'); break;
      default:
        redirect('/');
    }
  }
}