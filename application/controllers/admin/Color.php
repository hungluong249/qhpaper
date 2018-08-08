<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Color extends Admin_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('color_model');
        $this->load->helper('common');
        $this->author_data = handle_author_common_data();
    }

	public function index()
	{
		echo 1;
	}

}

/* End of file Color.php */
/* Location: ./application/controllers/admin/Color.php */