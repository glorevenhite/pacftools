<?php

class Site_navigation extends Widget {
  function run() {
    $data['username'] = $this->session->userdata('username');
    $this->render('site_navigation_widget', $data);
  }
}
