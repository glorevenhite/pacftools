<?php
class Project_model extends CI_Model {

  function create_project()
  {
    $new_project_data = array(
      'project_name' => $this->input->post('project_name'),
      'status' => $this->input->post('status'),
      'start'=> $this->input->post('start_date'),
        'end' => $this->input->post('end_date'),
        'user_id' => $this->input->post('assignee')
    );

    $insert = $this->db->insert('projects',$new_project_data);
    return $insert;
  }
}
