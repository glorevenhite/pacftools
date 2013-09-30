<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }

  function index() {
    $data['main_content'] = 'login_form';
    $this->template->title('Login Page');
    $this->template->set_layout('default');
    $this->template->build('login_form', $data);
  }

  /*
   * Validate membership
   */
  function validate_credentials() {
    // Validate user's credentials by using user_model itself
  	$query = $this->user_model->validate();


  	if($query) // if the user's credentials validated...
  	{
  		$data = array(
            'user_id' => $query->id,
  			'username' => $this->input->post('username'),
  			'is_logged_in' => true,
  		    'role' => $query->role
  		);
  		// Store user's data in session variables
    	$this->session->set_userdata($data);
    	redirect(base_url() . 'site/members_area');
  	}
  	else // incorrect username or password
  	{
  		$this->index();
  	}
  }

	function signup()
	{
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}

	function create_member()
	{
		$this->load->library('form_validation');

		// field name, error message, validation rules
		$this->form_validation->set_rules('full_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');


		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup_form');
		}

		else
		{
			$this->load->model('user_model');

			if($query = $this->user_model->create_member())
			{
				$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);
			}
			else
			{
				$this->load->view('signup_form');
			}
		}

	}

	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

    function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			$this->load->view('access_denied_page');
			die();
		}
	}

	function cp() {
	  // Check whether user has logged in by reading the data stored in session variables.
	  if($this->session->userdata('username')) {

	    // Get user details from databasae
	    $user = $this->user_model->get_member_details();

	    if(!$user) {
	      // No user found
	      return false;
	    }
	    else {
	      // display our widget
	      $this->load->view('site/user_widget', $user);
	    }
	  }
	  else {
	    return false;
	  }
	}

	function is_logged_in_as_admin()
	{
	   if($this->session->userdata('role') != 1)
	   {
          $this->load->view('access_denied_page');
          die();
          return false;
	   }
	   return true;
	}

	function is_admin()
	{
	  if($this->session->userdata('role') != 1)
	   {
          return true;
	   }
	   return false;
	}

	function display_users_in_droplist()
	{
      $data['users'] = $this->user_model->get_all_users();
      #$data['main_content'] = 'users_droplist_widget';
      #$this->template->build('users_droplist_widget', $data);

      $this->load->view('login/users_droplist_widget', $data);
	}
}