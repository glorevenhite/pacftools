<?php
class Project extends MX_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('project_model');
  }

  public function index()
  {
    $data['main_content'] = "";
    $this->load->view("includes/template", $data);
  }

  function add()
  {

    if($query = $this->project_model->create())
			{
				$data['main_content'] = 'created_project_successfully';
				$this->load->view('includes/template', $data);
			}
  }

  function show()
  {
    $this->load->library('table');
    $this->table->set_heading();

    $records = $this->project_model->get_all();
    $data['main_content'] = $this->table->generate($records);
    $this->load->view('projects_widget', $data);

  }

  function manage()
  {
    $data['projects'] = $this->project_model->get_all();
    $data['main_content'] = 'admin/projects_view';

    $this->load->view('includes/template.php',$data);
  }
}