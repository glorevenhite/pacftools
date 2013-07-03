<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Priceboard extends MX_Controller {

	public function index() {
        modules::run('login/is_logged_in');
        $this->load->view('insert_form');
	}

	function insert() {

	  $this->load->library('form_validation');
	  $this->form_validation->set_rules('price', 'Price', 'required');

	    if($this->form_validation->run() == FALSE) {
	      $data['main_content'] = "failure";
	      $this->load->view('includes/template',$data);
	    }
	    else {
	      $this->load->model('Priceboard_model');
	      $this->Priceboard_model->insert();
	      $data['main_content'] = "show_priceboard_view";
		  $this->load->view('includes/template', $data);
	    }
	}

	function show() {
      $this->load->model('Priceboard_model');
	  $this->load->library('table');
	  $records = $this->Priceboard_model->getAll();
	  $this->table->set_heading(array('id', 'date', 'price'));
	  $data['main_content'] = $this->table->generate($records);

	  $this->load->view('priceboard_widget', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */