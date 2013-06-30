<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Priceboard extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    $this->load->model('Priceboard_model');

	    $this->load->library('form_validation');
	    $this->load->library('table');

	    $data['records'] = $this->Priceboard_model->getAll();
	    $data['heading'] = "NhanXo";

	    $this->form_validation->set_rules('price', 'Price', 'required');

	    if($this->form_validation->run() == FALSE) {
	      $this->load->view('priceboard_view', $data);
	    }
	    else {
	      $this->Priceboard_model->insert();
		  $this->load->view('priceboard_view', $data);
	    }

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */