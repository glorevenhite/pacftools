<?php

class Site extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		Modules::run('login/is_login_in');
	}

	function members_area()
	{
		$this->load->view('logged_in_area');
	}

	function another_page() // just for sample
	{
		echo 'good. you\'re logged in.';
	}
}
