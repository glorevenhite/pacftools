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
}