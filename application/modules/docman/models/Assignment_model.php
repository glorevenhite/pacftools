<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Assignment_model extends CI_Model {

  function insert($user_id, $doc_id)
  {
    $data = array(
        'user_id' => $user_id,
        'doc_id' => $doc_id,
        'assigned_date' => date("Y-m-d")
        );
    $this->db->insert('docman_assignment', $data);
  }

  function get_assignees_by_document_id($doc_id)
    {
      $this->db->select("*");
      #$this->db->distinct();
      $this->db->from('docman_assignment');
      $this->db->join('users', 'users.id = docman_assignment.user_id ');
      $this->db->join('docman', 'docman.doc_id = docman_assignment.doc_id');
      $this->db->where('docman_assignment.doc_id', $doc_id);
      $result = $this->db->get();

      $data = null;

      if($result->num_rows() > 0)
      {
        foreach($result->result_array() as $row)
        {
          $data[] = $row;
        }
      }

      return $data;
    }

   function update_assignees($assignments)
   {
     $this->db->where_not_in('assignment_id', $assignments);
     $this->db->delete('docman_assignment');
   }
}