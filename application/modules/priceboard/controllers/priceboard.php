<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Priceboard extends MX_Controller {

	public function index()
	{
	    $this->load->model('Priceboard_model');
	    $this->load->library('table');
	    $records = $this->Priceboard_model->getAll();
	    $this->table->set_heading(array('id', 'date', 'price'));
	    $data['main_content'] = $this->table->generate($records);

	    //$data['main_content'] = 'price_table';
		$this->load->view('show_priceboard_view', $data);


	}

	function insert() {
	  $this->load->library('form_validation');
	  $this->form_validation->set_rules('price', 'Price', 'required');

	    if($this->form_validation->run() == FALSE) {
	      $data['main_content'] = "Insert new record successfully!";
	      $this->load->view('priceboard_view', $data);
	    }
	    else {
	      $this->load->model('Priceboard_model');
	      $this->Priceboard_model->insert();
		  $this->load->view('priceboard_view', $data);
	    }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */