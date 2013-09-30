<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {
  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $data['main_content'] = "administer";
    $this->template->build('administer', $data);
  }

  function create_user()
  {
    $data['main_content'] = 'create_user_form';
    $this->template->build('create_user_form', $data);
  }

  function list_users()
  {

  }
}
