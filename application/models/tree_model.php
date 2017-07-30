<?php
class Tree_Model extends CI_Model {
	
// 	function getCountryNationalities(){
// 		$this->db->select('*');
// 		$this->db->from('country');
// 		$query = $this->db->get();
		
// 		if ($query->num_rows() > 0) {
// 			//return $query->row()->name;
// 			return $query->result();
// 		} else {
// 			return 0;
// 		}
// 	}
	
	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

	function getAllNodes(){
		$this->db->select('*');
		$this->db->from('trees');
		$this->db->order_by('tree_parent_id',"asc");
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}		
	}

	function addNode(){
		$insdata= array();

		if(empty($this->input->post('node_name'))){
			return false;
		}

		$insdata['tree_label'] = $this->input->post('node_name');
		$insdata['tree_parent_id'] = $this->input->post('tree_parentnode');

		if($this->db->insert('trees',$insdata)){
			return true;
		}else{
			return false;
		}
	}
}
?>