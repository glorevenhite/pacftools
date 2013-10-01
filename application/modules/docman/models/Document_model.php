<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Document_model extends CI_Model {
  function create_document($document) {
    $insert = $this->db->insert('docman',$document);
    return $insert;
  }

  function get_all_documents() {
    global $data;

    $this->db->select('*');
    $this->db->from('docman');
    $result = $this->db->get();

    if ($result->num_rows() > 0 ) {
      foreach($result->result_array() as $row) {
        $data[] = $row;
      }
    }
    return $data;
  }

  function get_document_by_id($id)
  {
    global $data;

    $this->db->select('*');
    $this->db->from('docman');
    $this->db->where('doc_id = ', $id);
    $result = $this->db->get();

    if($result->num_rows() > 0) {
      foreach($result->result_array() as $row) {
        $data[] = $row;
      }
    }

    return $data;
  }

  function get_document_by($start_arrival, $end_arrival, $title, $code) {


    $this->db->select('*');
    $this->db->from('docman');
    $this->db->like('doc_title', $title);
    $this->db->like('doc_code', $code);
    $this->db->where('arrived_date >=', $start_arrival);
    $this->db->where('arrived_date <=', $end_arrival);
    $result = $this->db->get();

    global $data;
    if($result->num_rows() > 0) {
      foreach($result->result_array() as $row) {
        $data[] = $row;
      }
    }
    return $data;
  }

  function get_document_between_date($from, $to)
  {
  	$data = null;
  	
    $this->db->select('*');
    $this->db->from('docman');

    $this->db->where('arrived_date >=', $from);
    $this->db->where('arrived_date <=', $to);
    $result = $this->db->get();

    if($result->num_rows() > 0) {
      foreach($result->result_array() as $row) {
        $data[] = $row;
      }
    }
    return $data;
  }

  function get_document_by_doc_code($code)
  {
    $data = null;

    $this->db->select('*');
    $this->db->from('docman');
    $this->db->like('doc_code', $code);
    $result = $this->db->get();

    if($result->num_rows() > 0) {
      foreach($result->result_array() as $row) {
        $data[] = $row;
      }
    }
    return $data;
  }

  function get_document_by_doc_title($title)
  {
    $data = null;

    $this->db->select('*');
    $this->db->from('docman');
    $this->db->like('doc_title', $title);
    $result = $this->db->get();

    if($result->num_rows() > 0) {
      foreach($result->result_array() as $row) {
        $data[] = $row;
      }
    }
    return $data;
  }

  function update($doc_id, $document)
  {
    $this->db->where('doc_id', $doc_id);
    $result = $this->db->update('docman', $document);
    return $result;
  }

  function get_documents_assigned_to_user($user_id)
  {
    $this->db->select('*');
    $this->db->from('docman_assignment');
    $this->db->join('docman', 'docman.doc_id = docman_assignment.doc_id');
    $this->db->where('user_id', $user_id);
    $result = $this->db->get();
    $data;

    if($result->num_rows() > 0)
    {
      foreach($result->result_array() as $row)
      {
        $data[] = $row;
      }
    }
    else
    {
    	return null;
    }

    return $data;
  }

  function get()
  {
    die();

  }

}