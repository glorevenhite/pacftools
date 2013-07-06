<?php
class Project_model extends CI_Model {

  function create()
  {
    $new_project_data = array(
      'name' => $this->input->post('project_name'),
      'status' => $this->input->post('status'),
      'start'=> $this->input->post('start_date'),
        'end' => $this->input->post('end_date'),
        'user_id' => $this->input->post('assignee')
    );

    $insert = $this->db->insert('projects',$new_project_data);
    return $insert;
  }

  function get_all()
  {
    // list all projects with assignee
    $this->db->select('projects.id, name, start, end, status, full_name');
    $this->db->from('projects');
    $this->db->join('users', 'projects.user_id = users.id');
    $query = $this->db->get();

    if($query->num_rows() > 0 ) {
      foreach($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
  }

  function update()
  {

  }

  function delete() {

  }
}
