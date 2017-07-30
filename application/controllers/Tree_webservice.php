<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH.'libraries/REST_Controller.php');

class Tree_webservice extends REST_Controller {


	function __construct() {
		parent::__construct ();
		ini_set('display_errors', true);
		$this->load->helper('url');
		$this->load->model( 'Tree_Model', 'treemodel');
	}

	/**
	 * Tree get webservice - Json.
	 *
	 * Tree web service Controller
	 */
	public function tree_get($input)
	{
		//if(empty($this->input->get('format')){
			$format = "json";
		//}

		$arrNodes = $this->treemodel->getAllNodes();
		$json_data = "";

		if($format == "json"){
			$json_data = json_encode($arrNodes);
		}else{
			$json_data = $arrNodes;
		}

		$this->response($json_data, 200);
	}


	public function addtree_post($input)
	{
		//if(empty($this->input->get('format')){
			$format = "json";
		//} 
		$dbResult = $this->treemodel->addNode();

		if($dbResult){
			$json_data = "Added Node";
		}else{
			$json_data = "Not Success";
		}

		$this->response($json_data, 200);
	}
}
