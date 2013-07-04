<?php
class Project extends MX_Controller {
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['main_content'] = "add_new_project";
    $this->load->view("includes/template", $data);
  }

  function add()
  {
    $this->load->model('project_model');
    if($query = $this->project_model->create_project())
			{
				$data['main_content'] = 'created_project_successfully';
				$this->load->view('includes/template', $data);
			}
  }
}