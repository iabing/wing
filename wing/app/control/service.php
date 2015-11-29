<?php
class Service extends Control {

  function _() {
    redirect('/service/index');
  }

  function diy_computer() {
    load_template('service/diy_computer');
  }

  function software_maintenance() {
    load_template('service/software_maintenance');
  }

  function video_surveillance() {
    load_template('service/video_surveillance');
  }

}