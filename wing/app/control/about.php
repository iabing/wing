<?php
class About extends Control {

  function _() {
    load_template('about/index');
  }

  function team() {
    load_template('about/team');
  }

}