<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Priceboard extends MX_Controller {

  public function index()
  {
    modules::run('login/is_logged_in');
    $this->load->view('insert_form');
  }

  /*
   *Insert a new entry for priceboard
   */
  function insert()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('price', 'Price', 'required');

    if($this->form_validation->run() == FALSE)
    {
      $data['main_content'] = "failure";
      $this->load->view('includes/template',$data);
    }
    else
    {
      $this->load->model('Priceboard_model');
      $this->Priceboard_model->insert();
      $data['main_content'] = "show_priceboard_view";
      $this->load->view('includes/template', $data);
    }
  }

  /*
   * Show history price
   */
  function show()
  {
    $this->load->model('Priceboard_model');
    $this->load->library('table');

    // Retrieving all entries
    $records = $this->Priceboard_model->getAll();
    // Setting header for table
    $this->table->set_heading(array('id', 'date', 'price'));
    // Format output as table for display to browser
    $data['main_content'] = $this->table->generate($records);
    // Call the view corresponded
    $this->template->layout('default');
    $this->template->built('priceboard_widget', $data);
  }
}

/* End of file priceboard.php */
/* Location: ./application/modules/priceboard/controllers/priceboard.php */