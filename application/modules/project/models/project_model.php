<?php
class Project_model extends CI_Model {

  function create_project()
  {
    $new_project_data = array(
      'project_name' => $this->input->post('project_name'),
      'status' => $this->input->post('status'),
      'start'=> $this->input->post('start'),
        'end' => $this->input->post('end'),
        'user_id' => $this->input->post('user_id')
    );

    $insert = $this->db->insert('projects',$new_project_data);
    return $insert;
  }
}
