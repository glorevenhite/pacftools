<?php
class Site extends MX_Controller
{
	function __construct() {
		parent::__construct();
	}

	/*
	 * We wanted only logged in users to access dashboard are. So we'll use the modules run
	 * HMVC function and call is_logged_in check from the login controller. We then load the
	 * logged_in_area view file.
	 */
	function members_area() {
	    modules::run('login/is_logged_in');
		$this->load->view('logged_in_area');

	}
	/*
	 * We only wanted logged in users so we have have included the is_logged_in check.
	 */
	function message() {
	  // check whether user has logged in
      modules::run('login/is_logged_in');
      // load model
      $this->load->model('login/user_model');
      // retrieve details matching id in third segment of current URL
      $user = $this->user_model->get_member_details($this->uri->segment(3));

      if(!$user) {
        // No user found
        return false;
      }
      else {
        // display member's message page
        $this->load->view('member_message', $user);
      }
	}

	/*
	 * We want the profile pages to be public so we haven't included the is_logged_in check.
	 * We call login triad's user_model and query the database for our desired user
	 */
	function profile() {
	  // load user_model
      $this->load->model('login/user_model');
      // retrieve our desired user
      $user = $this->user_model->get_member_details($this->uri->segment(3));

      if(!$user) {
        //  No user found
        $data['main_content'] = 'member_profile';
        $data['notice'] = 'you need to view a profile id';
        $this->load->view('includes/template', $data);
      }
      else {
        // Display our widget
        $user['main_content'] = 'member_profile';
        $this->load->view('includes/template', $user);
      }
	}

	function another_page() // just for sample
	{
		echo 'good. you\'re logged in.';
	}
}
