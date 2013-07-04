<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function validate() {
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('users');

		if($query->num_rows == 1) {
			return true;
		}

	}

	function create_member() {
		$new_member_insert_data = array(
			'full_name' => $this->input->post('full_name'),
			'email_address' => $this->input->post('email_address'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);

		$insert = $this->db->insert('users', $new_member_insert_data);
		return $insert;
	}

	/*
	 * The following function call has a default variable $id. This allows us to an option of finding
	 * a user by ID rather than by username. This made optional by setting it to false in the declaration
	 */
	function get_member_details($id = false) {
	  if(!$id) {
	    // check whether login credential has been stored in session variables
        if($this->session->userdata('username')) {
          // retrieve member details matching with username
          $this->db->where('username', $this->session->userdata('username'));
        }
        else {
          // Return a non logged in person from accessing member profile dashboard
          return false;
        }
	  }
	  else {
	    // get user detail by id
	    $this->db->where('id', $id);
	  }

	  // Find all records that match this query
	  $query = $this->db->get('users');
	  // We haven't set the unique option for username so we return the last user created with selected username
	  if($query->num_rows() > 0) {
	    // get the last row
        $row = $query->last_row();
        // Assign the row to our return array
        $data['id'] = $row->id;
        $data['full_name'] = $row->full_name;
        // Return the user found
        return $data;
	  }
	  else {
	    // No result found
	    return false;
	  }
	}
}