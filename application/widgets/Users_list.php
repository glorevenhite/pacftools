<?php

class Users_list extends Widget {
  function run() {
    $this->load->model('login/User_model', 'user_model');

    $data['users'] = $this->user_model->get_all_users();
    $this->render('users_checkboxes_widget', $data);
  }
}
