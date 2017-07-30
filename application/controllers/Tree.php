<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tree extends CI_Controller {


	function __construct() {
		parent::__construct ();
		ini_set('display_errors', true);
		$this->load->helper('url');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Tree Controller
	 */
	public function index()
	{
		$this->load->view('tree_dasboard');
	}


	/**
	 * Index Page for this controller.
	 *
	 * Tree Controller
	 */
	public function addnode()
	{
		$this->load->view('tree_add_node');
	}
}
