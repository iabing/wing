<?php
class Mall extends Control {

  function _() {
    load_template('mall/index');
  }

  function item($_ = 0) {
    $data['item'] = $_;
    $data['title'] = 'goods';
    $data['goods'] = array('id' => 1, 'price' => '99.9', 'date' => '1991/09/01');
    $this -> view('mall/item', $data);
  }

}