<?php
class Priceboard_model extends CI_Model {
  function getAll() {
    $this->load->database();

    $this->db->select('id, datevalue, price');
    $this->db->from('nhanxo');
    $this->db->order_by("datevalue", "desc");
    $q = $this->db->get();

    if($q->num_rows() > 0 ) {
      foreach($q->result_array() as $row) {
        $data[] = $row;
      }
      return $data;
    }
  }

  function insert() {
    $this->load->database();
    $this->price = $_POST['price'];
    $this->datevalue = date('Y-m-d');

    $this->db->insert('nhanxo', $this);
  }
}